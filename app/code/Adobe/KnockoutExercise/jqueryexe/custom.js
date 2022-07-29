$(document).ready(function(){
    $('#addition').on('click', function () {
        var firstNo = $('#firstNo').val();
        var secondNo = $('#secondNo').val();
        $('#sum').val(Number(firstNo) + Number(secondNo));
    })
})