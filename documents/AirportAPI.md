---
layout: page
Title: Airport Resource
permalink: /airportresource/  
---  

# Overview  
The Airport Resource allows the user to receive information regarding a specific airport based on the input of an ICAO airport ID.The ICAO airport ID refers to a set of international codes used to identify airports. The code for each airport can easily be found in online databases.  
  
# Functions  
The functions of this resource are as follows:  
- **Airport Name:** Provides the official name of the airport.
- **Airport Size:** Provides insight to whether the airport is for private or commercial flights.
- **Airport Longitude and Latitude:** Provides the geographic coordinates of the airport in degrees. 
- **Airport Elevation:** Provides the elevation of the airport in feet.
- **Airport Continent:** Provides the continent the airport is located on using its abbreviation.
- **Airport Country:** Provides the country in which the airport is located using its abbreviation.
- **Airport Region:** Provides a specific region within the country which the airport is located using its abbreviation.
- **Airport Municipality:** Provides the city in which the airport is located.  
- **Airport Codes-Local:** Provides the national or local code for the airport. 
# Use  
To use the Airport Resource, a specific URL inputed into the browswer.  
  
http://server/api/airport/id  

The server and ICAO ID must be inputed to receive an output. 

## Example

For this example, we will use the following information to create our URL:
**Server:** 54.167.221.72   
**Airport ID:** KMCO
  
The resulting URL is:  
http://54.167.221.72/api/airport/KMCO

Using this URL, you receive the following output.  
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

From this output we can determine:
- **Aiport Size:** Large  
- **Airport Name:** Orlando International Airport  
- **Airport Geographic Coordinates:** (28.42939949,-81.30899811)  
- **Airport Elevation:** 96 ft.  
- **Airport Continent:** North America 
- **Airport Country:** United States  
- **Airport Region:** United States-Florida  
- **Airport City:** Orlando  
- **Airport ID Local:** MCO  
