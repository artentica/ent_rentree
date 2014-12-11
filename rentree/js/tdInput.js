// TdInput CLASS DEFINITION
  // ======================

$.fn.ModifiedTd = function(definitionAction){

    //Object table
    var myTable = $(this);
    //Version plugin


    //Default parameters
    tdInput_defaultSettings = {
    nametd  : "action_modified",
    tdununique : false,
    isButton : true,
    modifiedclass : "btn-primary",
    saveclass : "btn-success",
    cancelclass : "btn-danger",
    modifiedglyph : "glyphicon glyphicon-pencil",
    saveglyph : "glyphicon glyphicon-floppy-disk",
    cancelglyph : "glyphicon glyphicon-ban-circle",
  };


    tdInput_defaultSettings.VERSION  = '1.0.0';

    if (typeof definitionAction != 'undefined'){
        var tdpersonnalised = $.extend( {}, tdInput_defaultSettings, definitionAction );
    }
    else{
        var tdpersonnalised = tdInput_defaultSettings;
    }

    var buttonClass="";

    if(tdpersonnalised.isButton) buttonClass="btn "









    $(myTable.selector + " ." +tdpersonnalised.nametd).append("<button class=\""+ buttonClass + tdpersonnalised.modifiedclass +"\"><span class=\""+ tdpersonnalised.modifiedglyph +"\" aria-hidden=\"true\"></span></button><button class=\"" + buttonClass + tdpersonnalised.saveclass +"\"><span class=\""+ tdpersonnalised.saveglyph +"\" aria-hidden=\"true\"></span></button><button class=\"" + buttonClass + tdpersonnalised.cancelclass +"\"><span class=\""+ tdpersonnalised.cancelglyph +"\" aria-hidden=\"true\"></span></button>");
 console.log();

$(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).hide();
$(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).hide();



    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.modifiedclass).on('click', function(){
        if ( $(myTable.selector + " td").hasClass("modified_input_open") ) {
            hide_precedent_input();


        }

        $(this).hide();
        $(this).parent().addClass("modified_input_open");
        $(this).parent().children("." + tdpersonnalised.cancelclass).show();
        $(this).parent().children("." + tdpersonnalised.saveclass).show();



        $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).each(function( index , element){

            var value = $(element).text().replace('"', '\"');
            eval("value_number" + index +" = '"+value+ "';");
            $(element).text("");
            $(element).append("<input class='form-control' type='text' value='"+ value +"'>");
            console.log("yolo");
            console.log(value_number0);
        });

    });


    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.cancelclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();


        $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).each(function( index , element){
            var value = $(element).children("input").val().replace('"', '\"');
            $(element).text("");
            $(element).append(value);

        });

        $(".modified_input_open").removeClass( "modified_input_open" );

    });


    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.saveclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();


        $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).each(function( index , element){
            eval("value = value_number"+ index+ ";");
            $(element).text("");
            $(element).append(value);

        });

        $(".modified_input_open").removeClass( "modified_input_open" );

    });


    function hide_precedent_input(){
         //console.log(".modified_input_open button." + tdpersonnalised.cancelclass);

        $(".modified_input_open button." + tdpersonnalised.cancelclass).hide();
        $(".modified_input_open ." + tdpersonnalised.saveclass).hide();
        $(".modified_input_open ." + tdpersonnalised.modifiedclass).show();
        $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).each(function( index , element){
            var value = $(element).children("input").val().replace('"', '\"');
            $(element).text("");
            $(element).append(value);

        });
        $(".modified_input_open").removeClass( "modified_input_open" );
    }


}
