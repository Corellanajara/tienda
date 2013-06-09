$(document).ready(function(){
        $(".tweet").tweet({ // aca es donde se le indica donde poner los tweets, le pondremos un div vacio con clase .tweets
            username: "infoAlbatronic", // el usuario
            avatar_size: 0, // Ponle 0 si no quieres avatares
            count: 2, // Numero de tweets
            loading_text: "Tweets de Albatronic"
        });
});