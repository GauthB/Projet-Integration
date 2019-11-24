export function getEvents(){
   return fetch('https://peopleflux.gauthierbohyn.com/app/dbReturnEvent.php',
   {
     method: "GET",
     headers: {
       'Accept': 'application/json',
       'Content-Type': 'application/json',
     },
   })
   .then((response) => response.json())
   .then((responseData) => {
     return responseData;
   })
   .catch(error => console.warn(error));
 }
