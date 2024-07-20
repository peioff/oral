
function test(){


        console.log('fonction test appelée');
        $.ajax({
                url: "http://localhost/ecf/testAjax",
                method: "post",
                dataType: "json",
            }
        ).done(function (response) {
            console.log(response);
            console.log(response.success);
            console.log(response.message);
        })

            //Ce code sera exécuté en cas d'échec - L'erreur est passée à fail()
            //On peut afficher les informations relatives à la requête et à l'erreur
            .fail(function (error) {
                alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
            })

            //Ce code sera exécuté que la requête soit un succès ou un échec
            .always(function () {
                // alert("Requête effectuée");
            });




}
