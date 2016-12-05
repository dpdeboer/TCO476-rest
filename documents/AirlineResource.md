---
layout: page
Title: Airline Resource
permalink: /airlineresource/
---  
# Overview  
The Airline Resource provides information pertaining to the airline name and owner. This resource is a read-only resource, meaning the resource can only be updated by a database administrator. It cannot be updated through the API itself.
# Functions  
The information provided by this resource is as follows:  
- **Airline Name:** The name associated with the airline.  
- **Airline Owner:** The name of the airline owner.
# Use  
The resource can be accessed an used through a URL in the following format:  
  
  http://server/api/airline/id  

  The specific server and Airline ID are required to create the URL.  

**Example**  
The following is an example of how to create the URL input and gathering information from the output.  

To form the URL, the server and Airline ID are required. For this example, we will use the following:  
**Server:** 54.167.221.72  
**Airline ID:** 1  
  
The following URL is formed:  
http://54.167.221.72/api/airline/1  
  
Resulting in the following output:  
{  
    "AirlineId": "1",  
    "AirlineName": "Test Airline",  
    "OwnerName": "Bob Watson"  
}  
  
  From this output we can determine the following information:  
  - **Airline Name:** Test Airline  
  - **Airline Owner:** Bob Watson
