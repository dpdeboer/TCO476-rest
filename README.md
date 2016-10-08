# TCO476-rest
Code for REST API exercises

This code supports a basic REST API for \[very\] small airlines.

## URL

The base URL is:

```http://<server>/api/<resource>/<id>[?query-parameter-string]```

## Resources

This api supports these resources:

### Airline

**Not implemented yet**

#### URL
```http://<server>/api/airline/<id>```
ID = the numeric ID of the airline

#### Response

This is the response definition for an airline request entry.

```
{
  "AirlineId": <number>,
  "AirlineName": <string>,
  "OwnerName": <string>
}
```

### Airport
**Not implemented yet**

#### URL
```http://<server>/api/airport/<id>```
ID = the ICAO ID of the airport

#### Response

This is a sample response to an airport request.

```
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

### Flight

**Not implemented yet**

#### URL
```http://<server>/api/flight/<id>```
ID = the numeric ID of the flight

#### Response

This is the response definition for an flight request entry.

```
{
  "AirlineId": <airline ID number>,
  "PilotId": <pilot ID number>,
  "StartAirportId": <airport ID string>,
  "StartTime": <datetime>,
  "EndAirportId": <airport ID string>,
  "EndTime": <datetime>
}
```

### Pilot


**Not implemented yet**

#### URL
```http://<server>/api/pilot/<id>```
ID = the numeric ID of the pilot

#### Response

This is the response definition for an pilot request entry.

```
{
  "PilotId": <pilot ID number>,
  "LastName": string,
  "FirstName": string,
  "AirlineId": <airline ID number>
}
```
