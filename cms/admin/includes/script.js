$(document).ready(function(){
         //editor
         ClassicEditor
         .create( document.querySelector( '#body' ) )
         .then( editor => {
                 console.log( body );
         } )
         .catch( error => {
                 console.error( error );
         } );
 
         //rest of the code

         
});