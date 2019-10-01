function confirmOutgoing(id, checked){

    console.log("checkbox with id: " + id + " has the value: " + checked);

    var value = checked ? 1 : 0;

    $.ajax({
        type:'POST',
        url:'http://localhost/MyRepository/Ajax/outgoingConfirmCheckbox.php',
        data:{id:id,value:value},
        success: function(data){
            if(data){
                location.reload();
            }else{
                alert("can't delete");
            }
        }

    });

}