$(document).ready(function (){    $('.tab_n').hide();
    $('.tab_n:first').show();
    $('.tab-1 a:first').addClass('active');
    $('.tab-1 a').click(function () {
        $('.tab-1 a').removeClass('active');
        $(this).addClass('active');
        $('.tab_n').hide();
        var activeTab = $(this).attr('href');
        $(activeTab).fadeIn(1000);
        return false;
    });
    $('.filterDiv').hide();
    $('.filterDiv:first').show();
    $('.tab-2 a:first').addClass('active');k
    $('.tab-2 a').click(function () {
        $('.tab-2 a').removeClass('active');
        $(this).addClass('active');
        $('.filterDiv').hide();
        var activeTab = $(this).attr('href');
        $(activeTab).fadeIn(1000);
        return false;
    });
    $('#drbtn').click(function () {
        if ($(this).attr("data-open", "open")) {
            $('.fa-arrow-circle-down').remove();
            $('.fa-arrow-circle-up').addClass();

            $(this).attr('data-open', 'close');
        } else {

            $('.fa-arrow-circle-up').remove();
            $('.up').addClass("fa-arrow-circle-down");
            $(this).attr('data-open', 'open');
        }
        $('.drop-contentSide').slideToggle('fast');
    });
    // //////////////////////////////////ajax//////////////////////////////////
    // //register
    // $("#submitReg").click(function () {
    //     $('#submitReg').attr('disable', 'disable');
    //     var fullname = $('.fullname').val();
    //     var username = $('.username').val();
    //     var email = $('.email').val();
    //     var Password = $('.Password').val();
    //     if (fullname != "" && username != "" && email != "" && Password != "") {
    //         $.ajax({
    //             url: "/Taskdev/register.php",
    //             type: "POST",
    //             data: {
    //                 fullname: fullname,
    //                 username: username,
    //                 email: email,
    //                 Password: Password
    //             },
    //             cache: false,
    //             success: function (dataResult) {
    //                 var dataResult = JSON.parse(dataResult);
    //                 if (dataResult.statusCode == 200) {
    //                     $("#submitReg").removeAttr("disabled");
    //                     $('#formRegister').find('input:text').val("");
    //                     $('#success').innerHTML("ok ok ");
    //                     console.log(fullname);
    //
    //                 } else if (dataResult.statusCode == 201) {
    //                     alert("Error occured !");
    //                 }
    //
    //             }
    //
    //         })
    //
    //     }
    //
    // });
    // //end register
    // //delete user
    // $('#deluser').click(function (url){
    //     $txt = confirm("Are You Sure ?");
    //     if ($txt == true) {
    //         window.location.href = url;
    //     }
    // });
});


//////////////////////////// this is for modal add users ///////////////////////////////
var modal = document.getElementById("myModal-register");
var btn = document.getElementById("myBtn-register");
var span = document.getElementsByClassName("close-register")[0];
btn.onclick = function () {
    modal.style.display = "block";
}
span.onclick = function () {
    modal.style.display = "none";
}
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

//////////////////////////// this is for mobile menu///////////////////////////////
// function myFunction_n() {
//     var x = document.getElementById("myLinks");
//     if (x.style.display === "block") {
//         x.style.display = "none";
//     } else {
//         x.style.display = "block";
//     }
// }
//
// function myFunction_edit() {
//     var x = document.getElementById("myLinks");
//     if (x.style.display === "block") {
//         x.style.display = "none";
//     } else {
//         x.style.display = "block";
//     }
// }

///////////////////////////  This is for Delete Post in Category   //////////////////////////////////
function conf(url) {

    const txt = confirm("Are You Sure ?");
    if (txt == true) {
        window.location.href = url;
    }
    else {
        alert("Not Deleted");
    }

}

///////////////////////////  This is for Delete User in User   //////////////////////////////////
// function conf1(url1) {
//
//     const txt = confirm("Are You Sure ?");
//     if (txt == true) {
//         window.location.href = url1;
//     }
//     //else {
//     //     alert("Not Deleted");
//     // }
//
// }

/*///////////////////////////////////// Ajax  ///////////////////////////////////////////*/
// const http = new EasyHttp;
// http.get('adminpanel.php')
//     .then(data => {
//         var cats = "<?php echo $cats ?>";
//         console.log((cats));
//     })
//     .catch(err => console.log(err));

///////////////////////////// this is for DropDown LogOut in side bar  /////////////////////////////
// function myFunction() {
//     document.getElementById("myDropdown").classList.toggle("show");
// }

// Close the dropdown if the user clicks outside of it
// window.onclick = function (event) {
//     if (!event.target.matches('.dropbtn')) {
//         var dropdowns = document.getElementsByClassName("dropdown-content");
//         var i;
//         for (i = 0; i < dropdowns.length; i++) {
//             var openDropdown = dropdowns[i];
//             if (openDropdown.classList.contains('show')) {
//                 openDropdown.classList.remove('show');
//             }
//         }
//     }
// }

/*//////////////////////////  this is for preview image in post /////////////////////////////*/
// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//
//         reader.onload = function (e) {
//             $('#blah')
//                 .attr('src', e.target.result)
//                 .width(180)
//                 .height(100);
//         };
//
//         reader.readAsDataURL(input.files[0]);
//     }
// }

/* //////////////////////set a default image in posts////////////////////// */
