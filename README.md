# TCO476-rest
Code for REST API exercises

This code supports a basic REST API for \[very\] small airlines.

## URL

The base URL is:

```
http://<server>/api/<resource>/<id>[?query-parameter-string]
``` 

## Resources

This api supports these resources:

### airline

Returns an airline resource.


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

Manages pilot resources.

#### Methods

| Method | Comments |
|--------|----------|
| GET | Returns the specified pilot resource. |
| POST | **Not implemented** |
| PUT | **Not implemented** |
| DELETE | **Not implemented** |

#### URL

```
http://<server>/api/pilot/<id>
```

ID = the numeric ID of the pilot

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


## Query Parameters

These query parameters can be used to modify the request as described in the table.

| Parameter | Value | Action | airline | airport | flight | pilot |
|-----------|-------|--------|:-------:|:-------:|:------:|:-----:|
| debug     | true | returns debugging information about the request in the response | Opt | Opt | Opt | Opt |
| airlineId | valid airline ID | selects the airline to which the resource belongs | No | No | Req | No |
| accessKey | valid access ID string | specifies the key that grants access to the resources | * | No | * | * |

*Not implemented, but planned to be implemented before release.
