$(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Delete?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Your imaginary file is safe!");
        }

    });
});

$(document).on("click", "#confirm", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Confirm?",
        text: "Once Confirm, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Confirm!");
        }

    });
});

$(document).on("click", "#processing", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Processing?",
        text:  "Once Confirm, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Processing!");
        }

    });
});



$(document).on("click", "#order", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Picked?",
        text:  "Once Picked, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Picked!");
        }

    });
});

$(document).on("click", "#shipped", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To shipped?",
        text:  "Once shipped, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not shipped!");
        }

    });
});

$(document).on("click", "#delivery", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Delivery?",
        text:  "Once Delivery, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Delivery!");
        }

    });
});

$(document).on("click", "#cancel", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure To Cancel?",
        text:  "Once Cancel, you will not go Back Step Again!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;

        } else {
            swal("Not Cancel!");
        }

    });
});