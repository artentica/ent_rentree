// TdInput CLASS DEFINITION
  // ======================

$.fn.ModifiedTd = function(definitionAction){

    //Object table
    var myTable = $(this);
    console.log(myTable);
    //Version plugin


    //Default parameters
    tdInput_defaulSettings = {
    nametd  : "action_modified",
    tdununique : false,
    nametable : "table_to_modified",
    modifiedclass : "btn btn-primary",
    saveclass : "btn btn-success",
    cancelsave : "btn btn-danger",
    font : true,
    modifiedbutton : "glyphicon glyphicon-pencil",
    savebutton : "glyphicon glyphicon-floppy-disk",
    cancelbutton : "glyphicon glyphicon-ban-circle",
  };
    tdInput_defaulSettings.VERSION  = '1.0.0';

    if (typeof definitionAction != 'undefined'){
        var tdpersonnalised = $.extend( {}, tdInput_defaulSettings, definitionAction );
        console.log("personnalisé");
    }
    else{
        var tdpersonnalised = tdInput_defaulSettings;
        console.log("NON personnalisé");
    }

    console.log(tdpersonnalised);

}
