//Return JSON of all Events
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


//Return JSON of all Stages
 export function getStages(){
    return fetch('https://peopleflux.gauthierbohyn.com/app/dbReturnStage.php',
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


//Return JSON of all Pers
  export function getNbrPers(){
     return fetch('https://peopleflux.gauthierbohyn.com/app/dbReturnNbrPers.php',
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
