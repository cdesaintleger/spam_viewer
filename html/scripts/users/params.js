
/*
 * Mise à jour de l'etat de exclude
 * d'une adresse
 */
update_exclude  =   function(accountId){
    alert(accountId)
}

load_script = function(){
    var handles = ['square_slider_handle_min'];
    var square_slider = new Control.Slider(handles, 'square_slider', {
        range: $R(0, 100),
        values: $R(0, 100),
        sliderValue: [50],
        increment: 50,
        spans: ["square_slider_span"],
        restricted: true
    });
}