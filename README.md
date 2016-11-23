# TCO476-rest
Code for REST API exercises

This code supports a basic REST API for \[very\] small airlines.

## URL

The base URL is:

```
http://<server>/api/<resource>/<id>[?query-parameter-string]
``` 

The test server URL is:

```
http://54.167.221.72/api/
``` 

and a sample resource request is:

```
http://54.167.221.72/api/airport/KMCN
``` 


## Resources

This api supports these resources:

| Resource | Resource Description | Release milestone |
|----------|-------------|------------|
| **airline** | A resource that can have flight, pilot, and scheduled flight (scheduledFlight) resources | Fall 2016 |
| **airport** | An airport from the ICAO database | Fall 2016 |
| **flight** | A general trip from one airport to another. It is not a scheduled flight. See **scheduledFlight** for the resource that describes a scheduled flight. | Fall 2016 |
| **pilot** | A pilot who would fly a plane on a scheduled flight. | Fall 2016 |
| **scheduledFlight** | An instance of a flight that is scheduled for a specific date. | Spring 2017 |
| **plane** | An aircraft. A **plane** can be assigned to a flight. | Spring 2017 |

### airline

Returns an airline resource.

This is a read-only endpoint and cannot be updated by using the API. It must be updated through the database by an administrator.

#### Methods

| Method | Comments | 
|--------|----------|
| GET | Returns the specified airline resource |
| POST | **Not allowed** |
| PUT | **Not allowed** | 
| DELETE | **Not allowed** | 

#### URL

```
http://<server>/api/airline/<id>
```

ID = the numeric ID of the airline

#### Response

This is sample response to an airline request.

```javascript
{
	"AirlineId": "1",
	"AirlineName": "Test Airline",
	"OwnerName": "Bob Watson"
}
```

### airport

Returns an airport resource

This is a read-only endpoint and cannot be updated by using the API. It must be updated through the database by an administrator.

#### Methods

| Method | Comments |
|--------|----------|
| GET | returns specified airport resource |
| POST | **Not allowed** | 
| PUT | **Not allowed** |
| DELETE | **Not allowed** |

#### URL

```
http://<server>/api/airport/<id>
```

ID = the ICAO ID of the airport

#### Response

This is a sample response to an airport request.

```javascript
{
  "ident": "KMCO"
  "type": "large_airport"
  "name": "Orlando International Airport"
  "latitude_deg": "28.42939949"
  "longitude_deg": "-81.30899811"
  "elevation_ft": "96"
  "continent": "NA"
  "iso_country": "US"
  "iso_region": "US-FL"
  "municipality": "Orlando"
  "gps_code": "KMCO"
  "iata_code": "MCO"
  "local_code": "MCO"
}
```

### flight

Manages flight resources.

#### Methods

| Method | Comments |
|--------|----------|
| GET | Returns the specified flight resource* |
| POST | **Not implemented** |
| PUT | **Not implemented** |
| DELETE | **Not implemented** |

* Requires a query parameter.

#### URL

```
http://<server>/api/flight/<id>?airlineId=<airlineId>
```

ID = the numeric ID of the flight

#### Response

This is a sample response to a flight request.

```javascript
{
	"AirlineId": "1",
	"FlightId": "999",
	"StartAirportId": "KMCN",
	"StartTime": null,
	"EndAirportId": "KATL",
	"EndTime": null
}
```

### pilot

Manages pilot resources

#### Methods

| Method | Comments |
|--------|----------|
| GET | Returns the specified pilot resource. |
| POST | Adds a new pilot to an airline. |
| PUT | **Not implemented** |
| DELETE | Removes a pilot from an airline. |

#### URL

```
http://<server>/api/pilot/<id>
```

ID = the numeric ID of the pilot

#### Request

| Method | Request info |
|--------|----------|
| GET | The pilot to retrieve is specified by ID in the URL. |
| POST | The pilot is described by a data object that contains the pilot's **LastName**, **FirstName**, & **irlineId** |
| PUT | **Not implemented** |
| DELETE | The pilot to remove is specified by ID in the URL.  |

#### Response

This is a sample response to a pilot request.

```javascript
{
    "PilotId": "1",
    "LastName": "Watson",
    "FirstName": "Bob",
    "AirlineId": "1"
}
```

### scheduledFlight

An instance of a flight that is scheduled for a specific date. The desecription of a **scheduledFlight** refers to a:

* **flight**
* **pilot**
* **plane**

#### Methods

| Method | Comments |
|--------|----------|
| GET | **Not implemented** |
| POST | **Not implemented** |
| PUT | **Not implemented** |
| DELETE | **Not implemented** |

#### URL

```
http://<server>/api/scheduledFlight/<id>?airlineId=<airlineId>
```

ID = the numeric ID of the scheduled flight record (not the flight number used by passenger).

#### Response

**Not implemented**

### plane

An aircraft. A **plane** can be assigned to a flight. 

| Method | Comments |
|--------|----------|
| GET | **Not implemented** |
| POST | **Not implemented** |
| PUT | **Not implemented** |
| DELETE | **Not implemented** |

#### URL

```
http://<server>/api/plane/<id>?airlineId=<id>
```

ID = the ID of the plane

#### Response

**Not available**


## Query Parameters

These query parameters can be used to modify the request as described in the table.

| Parameter | Value | Action | airline | airport | flight | pilot |
|-----------|-------|--------|:-------:|:-------:|:------:|:-----:|
| debug     | true | returns debugging information about the request in the response | Opt | Opt | Opt | Opt |
| airlineId | valid airline ID | selects the airline to which the resource belongs | No | No | Req | No |
| accessKey | valid access ID string | specifies the key that grants access to the resources | * | No | * | * |

*Not implemented, but planned to be implemented before release.


# Issue labels

| Label name | Description | Expected outcome |
|------------|-------------|------------------|
| [bug](https://github.com/rbwatson/TCO476-rest/labels/bug) | does not work as it should | the problem should be fixed |
| [documentation](https://github.com/rbwatson/TCO476-rest/labels/documentation) | a documentation issue | depends on another label (e.g. **bug** or **help wanted**) |
| [duplicate](https://github.com/rbwatson/TCO476-rest/labels/duplicate) | there's already an issue like this one | ignore this one and refer to the original issue |
| [feature](https://github.com/rbwatson/TCO476-rest/labels/feature) | a feature that does not currently exist | create the functionality described in the issue |
| [help wanted](https://github.com/rbwatson/TCO476-rest/labels/help%20wanted) | need help | offer assistance as described in the issue |
| [in progress](https://github.com/rbwatson/TCO476-rest/labels/in%20progress) | someone is working on this | don't work on this because someone else is |
| [invalid](https://github.com/rbwatson/TCO476-rest/labels/invalid) | the issue is not clear or well defined | clarify or close the issue |
| [question](https://github.com/rbwatson/TCO476-rest/labels/question) | need the information described in the question | provide the information, if possible |
| [wontfix](https://github.com/rbwatson/TCO476-rest/labels/wontfix) | the issue will not be addressed | nothing further |
