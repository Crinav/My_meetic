$(document).ready(function () {

    $('#email').on('focusout', function () {
        var donnees = $(this).serialize();
        console.log(donnees);
        $.ajax({
            type: 'POST',
            url: 'controller/controller_login.php',
            data: donnees,
            success: function (res) {

                console.log(res)
            }
        });

    });
    $(".cache").toggleClass('hidden');
    $(".compte").hover(function () {
        $(".compte").height('60').fadeIn('slow');
        $(".cache").toggleClass('hidden');
    });
    $(".compte").mouseleave(function () {
        $(".cache").addClass('hidden');
        $(".compte").height('20');
    });

    //Changer les infos
    $('#change_info').submit(function(e) {
        e.preventDefault();
        var date = new Date;
        var now = date.getFullYear();
        var year = parseInt($("#date_naissance").val().substring(0, 4));
        var month = parseInt($("#date_naissance").val().substring(7, 5));
        var day = parseInt($("#date_naissance").val().substring(10, 8));
        var age = now - 18;
        
        if (age > year || $('#date_naissance').val() == "") {
            var donnees = $("#change_info").serialize(); 
            console.log(donnees);
            $.ajax({
                type: 'POST',
                url: '../controller/controller_compte.php',
                data: donnees,
                success: function (response) {
                    alert('changements effectués...')
                    
                    console.log(response)
                },
                error: function(response){
                    alert("fail");
                }
                
            });
           
        }
        else if (age == year) {
            if (parseInt(date.getMonth() + 1) >= month) {
                if (parseInt(date.getDay() + 4) > day) {
                    var donnees = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url: 'controller/controller_compte.php',
                        data: donnees,
                        success: function (response) {
                            alert('changements effectués...')
                            
                            console.log(response)
                        }
                    });
                } else { alert('Vous ne pouvez pas avoir moins de 18 ans ! '); }
            } else { alert('Vous ne pouvez pas avoir moins de 18 ans !'); }
        } else { alert('Vous ne pouvez pas avoir moins de 18 ans !'); }
    });




    /*$("#log").submit(function (e) {
        e.preventDefault();
        var donnees = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'controller/controller_login.php',
            data: donnees,
            success: function (resp) {
                alert('tentative de log')
                
                
                
                //document.location.href = 'controller/controller_login.php';
            }
        });
    });*/

    /*$("#recherche").submit(function (e) {
        e.preventDefault();
        var donnees = $(this).serialize(); 
        
        console.log(donnees);alert('click sur submit');
        $.ajax({
            type: 'POST',
            url: '../controller/controller_search.php',
            
            data: donnees,
            success: function (res) {
                alert('recherche envoyée...')
                console.log()
                $(".slide").empty();
                
                //document.location.href = '../controller/controller_search.php'
        
            }
        });
    })*/
    
    $("#inscription").submit(function (e) {
        e.preventDefault();
        var date = new Date;
        var now = date.getFullYear();
        var year = parseInt($("#date_naissance").val().substring(0, 4));
        var month = parseInt($("#date_naissance").val().substring(7, 5));
        var day = parseInt($("#date_naissance").val().substring(10, 8));
        var age = now - 18; 
        if ($('#majeur').is(':checked')) {
            event.preventDefault();
            if (age > year) {
                var donnees = $(this).serialize(); 
                $.ajax({
                    type: 'POST',
                    url: 'controller/controller_login.php',
                    data: donnees,
                    success: function (response) {
                        alert('inscription réussie...')
                        location.href = 'vue/search.php'
                        console.log(response)
                    },
                    error: function(response){
                        alert("fail");
                    }
                });
            }
            else if (age == year) {
                if (parseInt(date.getMonth() + 1) >= month) {
                    if (parseInt(date.getDay() + 4) > day) {
                        var donnees = $(this).serialize();
                        $.ajax({
                            type: 'POST',
                            url: 'controller/controller_login.php',
                            data: donnees,
                            success: function (response) {
                                alert('inscription réussie...')
                                location.href = 'vue/search.php'
                                console.log(response)
                            }
                        });
                    } else { alert('Ce site est réservé aux personnes majeures ! '); }
                } else { alert('Ce site est réservé aux personnes majeures !'); }
            } else { alert('Ce site est réservé aux personnes majeures !'); }
        } else { alert('Ce site est réservé aux personnes majeures ! En cochant la case "je suis majeur" vous acceptez nos CGU'); }
    });


   
//caroussel
    $(".resultat").click(function(){
        var numero = 0;
      
   });


});