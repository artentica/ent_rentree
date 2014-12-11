// TdInput CLASS DEFINITION
  // ======================

$.fn.ModifiedTd = function(definitionAction){

    //Object table
    var myTable = $(this);
    //Version plugin


    //Default parameters
    tdInput_defaultSettings = {
    nametd  : "action_modified",
    nameFinalButton:"",
    controleUniqueButton : false,
    buttunClass : "btn",
    modifiedclass : "btn-primary",
    saveclass : "btn-success",
    cancelclass : "btn-danger",
    ToSaveclass : "btn-success generation_element_to_change",
    modifiedtext : "",
    savetext : "",
    canceltext : "",
    ToSavetext : "",
    modifiedglyph : "glyphicon glyphicon-pencil",
    saveglyph : "glyphicon glyphicon-floppy-disk",
    cancelglyph : "glyphicon glyphicon-ban-circle",
    ToSaveglyph : "glyphicon glyphicon-saved",
    modifiedtitle : "",
    savetitle : "",
    canceltitle : "",
    ToSavetitle : "",
    identifier : "Id",
    notChange : "lockValue",
    saveOnChangeTd:true
  };


    tdInput_defaultSettings.VERSION  = '1.0.0';

    if (typeof definitionAction != 'undefined'){
        var tdpersonnalised = $.extend( {}, tdInput_defaultSettings, definitionAction );
    }
    else{
        var tdpersonnalised = tdInput_defaultSettings;
    }





//Multiple BUTTON DIV
if (!tdpersonnalised.controleUniqueButton){



//ADD OF BUTTONS
    $(myTable.selector + " ." +tdpersonnalised.nametd).append("<button title="+tdpersonnalised.modifiedtitle+" class=\""+ tdpersonnalised.buttunClass+ " "  + tdpersonnalised.modifiedclass +"\"><span class=\""+ tdpersonnalised.modifiedglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.modifiedtext+"</span></button><button title="+tdpersonnalised.savetitle+" class=\"" + tdpersonnalised.buttunClass+ " "  + tdpersonnalised.saveclass +"\"><span class=\""+ tdpersonnalised.saveglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.savetext+"</span></button><button title="+tdpersonnalised.canceltitle+" class=\"" + tdpersonnalised.buttunClass+ " " + tdpersonnalised.cancelclass +"\"><span class=\""+ tdpersonnalised.cancelglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.canceltext+"</span></button>");

//HIDE SAVE AND CANCEL BUTTON
$(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).hide();
$(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).hide();

    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.modifiedclass).on('click', function(){

        //If there already a td editing when we want to edit another
        if ( $(myTable.selector + " td").hasClass("modified_input_open") ) {

            $(".modified_input_open button." + tdpersonnalised.cancelclass).hide();
            $(".modified_input_open ." + tdpersonnalised.saveclass).hide();
            $(".modified_input_open ." + tdpersonnalised.modifiedclass).show();


            if(tdpersonnalised.saveOnChangeTd){
                $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
                    var value = $(element).children("input").val().replace('"', '\"');
                    if(eval("value != value_number"+ index+ ";")){
                        $(element).addClass("changed_value");
                        if($(element).parent("tr").not(".to_update_line")) $(element).parent("tr").addClass("to_update_line");
                    }
                    $(element).text("");
                    $(element).append(value);
                });
            }else{
                $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){

                    $(element).text("");
                    $(element).append(eval("value_number"+ index));
                });

            }
            $(".modified_input_open").removeClass( "modified_input_open" );
        }







        $(this).hide();
        $(this).parent().addClass("modified_input_open");
        $(this).parent().children("." + tdpersonnalised.cancelclass).show();
        $(this).parent().children("." + tdpersonnalised.saveclass).show();



        $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){

            var value = $(element).text().replace('"', '\"');
            eval("value_number" + index +" = '"+value+ "';");
            $(element).text("");
            $(element).append("<input class='form-control' type='text' value='"+ value +"'>");
        });
     });





    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.cancelclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();


        $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            var value = $(element).children("input").val().replace('"', '\"');
            if(eval("value != value_number"+ index+ ";")){
                $(element).addClass("changed_value");
                if($(element).parent("tr").not(".to_update_line")) $(element).parent("tr").addClass("to_update_line");
            }
            $(element).text("");
            $(element).append(value);

        });

        $(".modified_input_open").removeClass( "modified_input_open" );

    });


    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.saveclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();


        $(myTable.selector + " td.modified_input_open").parent("tr").children("td").not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            eval("value = value_number"+ index+ ";");
            $(element).text("");
            $(element).append(value);

        });

        $(".modified_input_open").removeClass( "modified_input_open" );

    });
}






//UNIQUE BUTTON DIV
if (tdpersonnalised.controleUniqueButton){

    //ADD OF BUTTONS
    $(" ." +tdpersonnalised.nametd).append("<button  title='"+tdpersonnalised.modifiedtitle+"' class=\""+ tdpersonnalised.buttunClass+ " "  + tdpersonnalised.modifiedclass +"\"><span class=\""+ tdpersonnalised.modifiedglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.modifiedtext+"</span></button><button title='"+tdpersonnalised.savetitle+"' class=\"" + tdpersonnalised.buttunClass+ " "  + tdpersonnalised.saveclass +"\"><span class=\""+ tdpersonnalised.saveglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.savetext+"</span></button><button title='"+tdpersonnalised.canceltitle+"' class=\"" + tdpersonnalised.buttunClass+ " " + tdpersonnalised.cancelclass +"\"><span class=\""+ tdpersonnalised.cancelglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.canceltext+"</span></button><button title='"+tdpersonnalised.ToSavetitle+"' class=\"" + tdpersonnalised.buttunClass+ " " + tdpersonnalised.ToSaveclass +"\"><span class=\""+ tdpersonnalised.ToSaveglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.ToSavetext+"</span></button>");


    var generate_info_target = (tdpersonnalised.ToSaveclass).replace(" ", ".");
    //HIDE SAVE AND CANCEL BUTTON
    $(" ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).hide();
    $(" ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).hide();
    $(" ." + tdpersonnalised.nametd + " button" + "." + generate_info_target).show();




    $(" ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.modifiedclass).on('click', function(){


        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.cancelclass).show();
        $(this).parent().children("." + tdpersonnalised.saveclass).show();
        $(" ." + tdpersonnalised.nametd + " button" + "." + generate_info_target).hide();



        $(myTable.selector + " tr td").not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            var value = $(element).text().replace('"', '\"');
            eval("value_number" + index +" = '"+value+ "';");
            $(element).text("");
            $(element).append("<input class='form-control' type='text' value='"+ value +"'>");
        });

    });


    $(" ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.cancelclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();
        $(" ." + tdpersonnalised.nametd + " button" + "." + generate_info_target).show();


        $(myTable.selector + " tr td").not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            var value = $(element).children("input").val().replace('"', '\"');
            if(eval("value != value_number"+ index+ ";")){
                $(element).addClass("changed_value");
                if($(element).parent("tr").not(".to_update_line")) $(element).parent("tr").addClass("to_update_line");
            }
            $(element).text("");
            $(element).append(value);

        });

        $(".modified_input_open").removeClass( "modified_input_open" );

    });


    $(" ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.saveclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();
        $(" ." + tdpersonnalised.nametd + " button" + "." + generate_info_target).show();


        $(myTable.selector + " tr td").not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            eval("value = value_number"+ index+ ";");
            $(element).text("");
            $(element).append(value);

        });

        $(".modified_input_open").removeClass( "modified_input_open" );

    });

}




}
