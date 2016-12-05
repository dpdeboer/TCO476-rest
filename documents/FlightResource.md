---
layout: page
Title: Flight Resource
permalink: /flightresource/
---  

# Overview 
The Flight Resource provides specific flight information including airports, airline, flight id, start and end time. The information can only be provided in the resource output if it is provided in the flight database. 
# Functions   
The output of this resource includes the following functions:  
- **Airline ID:** The ID of the airline providing the flight. 
- **Flight ID:** The ID of the flight.  
- **Start Airport:** The airport at which the flight departs from.  
- **Start Time:** The time at which the flight departs.  
- **End Airport:** The airport at which the flight arrives.
- **End Time:** The time at which the flight arrives.
# Use 
The Flight Resource can be accessed by the input of a unique flight URL. The URL uses server information, flight id, and airline ID to provide the output.  
**URL format:**  http://server/api/flight/id?airlineId=airlineId  
  
  **Example**  
  To create the URL, the following information must be inputed:  
  **Server:** 54.167.221.72  
  **Flight ID:** 999  
  **Airline ID:** 1 

  The following URL is created from this information:
  http://54.167.221.72/api/flight/999?1=1  

  The URL provides the following output:  
  {  
    "AirlineId": "1",  
    "FlightId": "999",  
    "StartAirportId": "KMCN",  
    "StartTime": null,  
    "EndAirportId": "KATL",  
    "EndTime": null  
}  
From this output, the following information can be obtained:  
- **Start Airport ICOA Code:** KMCN  
- **End Airport ICOA Code:** KATL  
- **Start Time:** Not provided  
- **End Time:** Not provided



