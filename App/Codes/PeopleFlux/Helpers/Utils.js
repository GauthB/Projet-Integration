export function Events(){

      return fetch('https://peopleflux.gauthierbohyn.com/app/dbReturnEvent.php')

        .then((response) => response.json())
        .catch((error) =>
        {
            console.error(error);

        });

}
