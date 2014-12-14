// TdInput CLASS DEFINITION
  // ======================

$.fn.ModifiedTd = function(definitionAction){

    //Object table
    var myTable = $(this);
    //Version plugin


    //Default parameters
    tdInput_defaultSettings = {
    nametd  : "action_modified",
    nameFinalButton:"final_button",
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
    parentChildrenArch : "tr td",
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

//console.log($(".jjbljhbljhbl").get(0));

//ADD OF BUTTONS
    $(myTable.selector + " ." +tdpersonnalised.nametd).append("<button title='"+tdpersonnalised.modifiedtitle+"' class=\""+ tdpersonnalised.buttunClass+ " "  + tdpersonnalised.modifiedclass +"\"><span class=\""+ tdpersonnalised.modifiedglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.modifiedtext+"</span></button><button title='"+tdpersonnalised.savetitle+"' class=\"" + tdpersonnalised.buttunClass+ " "  + tdpersonnalised.saveclass +"\"><span class=\""+ tdpersonnalised.saveglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.savetext+"</span></button><button title='"+tdpersonnalised.canceltitle+"' class=\"" + tdpersonnalised.buttunClass+ " " + tdpersonnalised.cancelclass +"\"><span class=\""+ tdpersonnalised.cancelglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.canceltext+"</span></button>");

//HIDE SAVE AND CANCEL BUTTON
$(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).hide();
$(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).hide();

    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.modifiedclass).on('click', function(){

        //If there already a td editing when we want to edit another
        if ( $(".modified_input_open").get(0)!= "undefined" ) {

            $(".modified_input_open button." + tdpersonnalised.cancelclass).hide();
            $(".modified_input_open ." + tdpersonnalised.saveclass).hide();
            $(".modified_input_open ." + tdpersonnalised.modifiedclass).show();


            if(tdpersonnalised.saveOnChangeTd){
                $(myTable.selector + " .modified_input_open").parent().children().not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
                    var value = $(element).children("input").val().replace('"', '\"');
                    if(eval("value != value_number"+ index+ ";")){
                        $(element).addClass("changed_value");
                        if($(element).parent().not(".to_update_line")) $(element).parent().addClass("to_update_line");
                    }
                    $(element).text("");
                    $(element).append(value);
                });
            }else{
                $(myTable.selector + " modified_input_open").parent().children().not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){

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
            $(element).append("<input class='form-control' type='"+ $(element).type +"' value='"+ value +"'>");
        });
     });





    $(myTable.selector + " ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.cancelclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();


        $(myTable.selector + " .modified_input_open").parent().children().not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            var value = $(element).children("input").val().replace('"', '\"');
            if(eval("value != value_number"+ index+ ";")){
                $(element).addClass("changed_value");
                if($(element).parent().not(".to_update_line")) $(element).parent().addClass("to_update_line");
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


        $(myTable.selector + " .modified_input_open").parent().children().not($(".modified_input_open")).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
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
    $(" ." +tdpersonnalised.nametd).append("<button  title='"+tdpersonnalised.modifiedtitle+"' class=\""+ tdpersonnalised.buttunClass+ " "  + tdpersonnalised.modifiedclass +"\"><span class=\""+ tdpersonnalised.modifiedglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.modifiedtext+"</span></button><button title='"+tdpersonnalised.savetitle+"' class=\"" + tdpersonnalised.buttunClass+ " "  + tdpersonnalised.saveclass +"\"><span class=\""+ tdpersonnalised.saveglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.savetext+"</span></button><button title='"+tdpersonnalised.canceltitle+"' class=\"" + tdpersonnalised.buttunClass+ " " + tdpersonnalised.cancelclass +"\"><span class=\""+ tdpersonnalised.cancelglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.canceltext+"</span></button><button disabled title='"+tdpersonnalised.ToSavetitle+"' class=\"" + tdpersonnalised.buttunClass+ " " + tdpersonnalised.ToSaveclass +"\"><span class=\""+ tdpersonnalised.ToSaveglyph +"\" aria-hidden=\"true\">"+tdpersonnalised.ToSavetext+"</span></button>");


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



        $(myTable.selector + " " +tdpersonnalised.parentChildrenArch).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            var value = $(element).text().replace('"', '\"');
            eval("value_number" + index +" = '"+value+ "';");
            $(element).text("");
            var temp = $(element).get(0).dataset.type;
            if (temp==undefined) temp = "text";
            $(element).append("<input class='form-control' type='"+ temp +"' value='"+ value +"'>");
        });

    });


    $(" ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.saveclass).on('click', function(){
        var ok= true;
        var some_change =false;
        var re = /\S+@\S+\.\S+/;


        $(myTable.selector + " " +tdpersonnalised.parentChildrenArch).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){


            if($(element).children().attr("type") == "number"){
                if (!$(element).children().val()){
                    ok = false;
                    $(element).addClass( "has-error has-feedback" );


                }
            }
            else if($(element).children().attr("type") == "email"){
                    if(!(re.test($(element).children().val()))){
                        ok = false;
                        $(element).addClass( "has-error has-feedback" );
                    }

            }
            else if($(element).children().attr("type") == "date"){

            }
            else $(element).removeClass( "has-error has-feedback" );

        });

        if(ok){
            $(myTable.selector + " " +tdpersonnalised.parentChildrenArch).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
                var value = $(element).children("input").val().replace('"', '\"');
                if(eval("value != value_number"+ index+ ";")){
                    $(element).addClass("changed_value");
                    if($(element).parent().not(".to_update_line")) $(element).parent().addClass("to_update_line");
                    some_change=true;
                }


                $(element).text("");
                $(element).append(value);
            });

                $(this).hide();
                $(this).parent().children("." + tdpersonnalised.cancelclass).hide();
                $(this).parent().children("." + tdpersonnalised.modifiedclass).show();
                $(" ." + tdpersonnalised.nametd + " button" + "." + generate_info_target).show();
            console.log(some_change);
           if(some_change) $(" ." + tdpersonnalised.nametd + " button" + "." + generate_info_target).removeAttr("disabled");
                $(".modified_input_open").removeClass( "modified_input_open" );
            }

    });


    $(" ." + tdpersonnalised.nametd + " button" + "." + tdpersonnalised.cancelclass).on('click', function(){

        $(this).hide();
        $(this).parent().children("." + tdpersonnalised.saveclass).hide();
        $(this).parent().children("." + tdpersonnalised.modifiedclass).show();
        $(" ." + tdpersonnalised.nametd + " button" + "." + generate_info_target).show();


        $(myTable.selector + " " +tdpersonnalised.parentChildrenArch).not($("."+tdpersonnalised.identifier)).not($("."+tdpersonnalised.notChange)).each(function( index , element){
            eval("value = value_number"+ index+ ";");
            $(element).text("");
            $(element).append(value);

        });

        $(".modified_input_open").removeClass( "modified_input_open" );

    });

}




}
