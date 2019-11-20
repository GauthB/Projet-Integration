export function Events(indice, attribut){
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
     return responseData[indice][attribut];
   })
   .catch(error => console.warn(error));
 }
