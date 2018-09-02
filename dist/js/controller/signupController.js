
$("#btnsignup").click(function () {
    console.log("CLick una");
    var ulength;
    var userName = $("#inputname").val();
    var name = $("#inputuname").val();
    var NIC = $("#inputunic").val();
    var telNo = $("#inpututelno").val();
    var password = $("#inputpassword").val();
    var address = $("#inputaddress").val();

    console.log(userName);
    console.log(name);
    console.log(NIC);
    console.log(telNo);
    console.log(password);
    console.log(address);

    var ajaxconfig = {
        method : "POST",
        url : "api/loginsignup.php",
        data : {
            action : "checkandsave",
            userName : userName,
            name : name,
            NIC : NIC,
            telNo : telNo,
            password : password,
            address : address
        },
        async : true
    }
    $.ajax(ajaxconfig).done(function(response){
        console.log("ajax eka wada kla");
        if(response == true){
            alert("You has been successfully signed Up!");
            window.location.href = "index.html?userName="+userName;

        }else{
            alert("There is a user with the givven user name!");
            $("#inputuname").val("");
            $("#inputuname").focus();

        }

    });

    // window.location.href = "index.html";

});

$("#btnlogin").click(function () {


})