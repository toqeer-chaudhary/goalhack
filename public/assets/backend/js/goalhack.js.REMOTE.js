

/*
=================================================================
        Toqeer Work
=================================================================
*/

$(document).ready(function() {

    // loader plugin initialization
    function loadingOut(loading) {
        setTimeout(() => loading.out(), 5000);
    }

    function loadingFunction() {
        var loading = new Loading();
        loadingOut(loading);
    }
    //  loader plugin initialization end
    // on hiding levelUpdate modal removing the border from it which was not working with the form
    $('#levelUpdateModal').on('hidden.bs.modal', function(){
       $("#updateLevelName,#updateLevelDescription").css({
           "border": "1px solid",
       })
    });
    // validation for levelCreateModal
    // function to validate level name
    function validateLevelName() {

        var levelName = $("#levelName").val();

        // validation for level Name
        if (levelName == "") {
            $("#levelName").css({
                "border": "1px solid red",
            });

            $(".levelNameError").text("Please provide a name");
            return true;
        }

        else {
            $("#levelName").css({
                "border": "1px solid green",
            });
            $(".levelNameError").text("");
            return false;
        }
    }

    // on blur
    $("#levelName").blur(function () {
        validateLevelName();
    });
    //   on focus
    $("#levelName").focus(function () {
        $("#levelName").css({
            "border": "1px solid",
        });
    });

    // function to validate level description
    function validateLevelDescription() {

        var levelDescription = $("#levelDescription").val();

        // validation for level Description
        if (levelDescription == "") {
            $("#levelDescription").css({
                "border": "1px solid red",
            });

            $(".levelDescriptionError").text("Please provide a description");
            return true;
        }

        else {
            $("#levelDescription").css({
                "border": "1px solid green",
            });
            $(".levelDescriptionError").text("");
            return false;
        }
    }

    // on blur
    $("#levelDescription").blur(function () {
        validateLevelDescription();
    });
    //   on focus
    $("#levelDescription").focus(function () {
        $("#levelDescription").css({
            "border": "1px solid",
        });
    });


    // create level process
    $("#levelCreateForm").on('submit', function (e) {
        e.preventDefault();
        if (validateLevelName() || validateLevelDescription()) {
            swal("Error", "Please fill the form correctly", "error");
            validateLevelName();
            validateLevelDescription();
        }
        else {
            //  checking if the level Nam already exist or not
            var levelName = $("#levelName").val();
            $.ajax({
                url: "level/" + levelName,
                type: "get",
                success: function (responseData) {
                    // 1 means that level name exist
                    if (responseData == 1) {
                        $(".levelNameError").text("this name has already been taken");
                    }

                    else
                    {

                        // removing border color from the input fields after form submission
                        $("#levelName").css({"border": "1px solid",});
                        $("#levelDescription").css({"border": "1px solid",});

                        var token = $('input[type="hidden"]').val();
                        var name = $("#levelName").val();
                        var parentLevelId = $("#parentLevel").val();
                        var description = $("#levelDescription").val();
                        // this is the url that we use for ajax request url and its dynamic.
                        var url = 'level';
                        // this is the type that we use for ajax request post and its dynamic.
                        var type = 'post';
                        // this is the data that we send through ajax call and its dynamic
                        var data = {
                            name: name, description: description,parent_id:parentLevelId,
                            _token: token, company_id: 1
                        };
                        // we mention function name here without brackets that we want to call after the response from ajax call.
                        var functionName = "appendRow";
                        //modal name to hide
                        var modalName = "#levelCreateModal";
                        // mention here the form name here
                        var formName = "#levelCreateForm";
                        // in this field we specify that which table or row id we want to append , remove, replace.
                        var tableOrRowId = "#ks-datatable";
                        var updateModalName = "#levelUpdateModal";
                        // message that you want to send for alert
                        var message = "level created successfully";

                        // calling generic ajax function
                        performAjaxRequest(url, type, data, modalName, message, functionName, formName, tableOrRowId, updateModalName);
                    }
                }
            });
        }
    });

    // validation for levelUpdateModal
    // function to validation level name
    function validateUpdateLevelName() {

        var updateLevelName = $("#updateLevelName").val();

        // validation for level Name
        if (updateLevelName == "") {
            $("#updateLevelName").css({
                "border": "1px solid red",
            });

            $(".updateLevelNameError").html("Invalid Level Name");
            return true
        }
        else {
            // $("#updateLevelName").css({
            //     "border": "1px solid green",
            // });
            $(".updateLevelNameError").empty();
            return false;
        }
    }

    // on blur
    $("#updateLevelName").blur(function () {
        validateUpdateLevelName();
    });
    // on focus
    $("#updateLevelName").focus(function () {
        $("#updateLevelName").css({
            "border": "1px solid",
        });
    });

    // function to validate assign privileges
    function validateUpdateLevelDescription() {

        var updateLevelDescription = $("#updateLevelDescription").val();

        // validation for assigned privileges
        if (updateLevelDescription == "") {
            $("#updateLevelDescription").css({
                "border": "1px solid red",
            });

            $(".updateLevelDescriptionError").html("Please provide level description");
            return true
        }
        else {
            // $("#updateLevelDescription").css({
            //     "border": "1px solid green",
            // });
            $(".updateLevelDescriptionError").empty();
            return false;
        }
    }

    // on blur
    $("#updateLevelDescription").blur(function () {
        validateUpdateLevelDescription();
    });
    //   on focus
    $("#updateLevelDescription").focus(function () {
        $("#levelDescription").css({
            "border": "1px solid",
        });
    });

    // on click of levelUpdateButton  want to display data in the relative fields
    $(document).on("click", "#levelUpdateButton", function () {
        var levelId = $(this).data("id");
        // getting the value from inside the first <td> of closest <tr>
        var levelName = $(this).closest('tr')["0"].cells["0"].innerHTML;
        var levelDescription = $(this).closest('tr')["0"].cells["1"].innerHTML;
        var parentLevel      = $(this).closest('tr')["0"].cells["2"].attributes["0"].nodeValue;
        // passing value to the update level name field
        $("#updateLevelName").val(levelName);
        $("#updateLevelDescription").val(levelDescription);
        $("#updateParentLevel").val(parentLevel);

        // update level process
        $("#levelUpdateForm").on('submit', function (e) {
            e.preventDefault();

            if (validateUpdateLevelName() || validateUpdateLevelDescription()) {

                swal("Error", "Please fill the form correctly", "error");
                validateUpdateLevelName();
                validateUpdateLevelDescription();
            }
            else {
                // level update process
                var token = $('input[type="hidden"]').val();
                var name = $("#updateLevelName").val();
                var description = $("#updateLevelDescription").val();
                var updateParentLevel = $("#updateParentLevel").val();
                var url = '/level/' + levelId;
                var type = 'put';
                var data = {
                    name: name,
                    description: description,
                    _token: token,
                    parent_id:updateParentLevel,
                };
                var functionName = "updateRow";
                var modalName = "#levelUpdateModal";
                var formName = "#levelUpdateForm";
                var tableOrRowId = "#level" + levelId;
                var updateModalName = "#levelUpdateModal";
                var message = "level updated successfully";

                //  calling generic ajax function
                performAjaxRequest(url, type, data, modalName, message, functionName, formName, tableOrRowId, updateModalName);

            }

        });
    });

// delete level process
    $(document).on("click", "#levelDeleteButton", function () {
        var levelId = $(this).data("id");
        var token = $('input[type="hidden"]').val();
        var url = 'level/' + levelId;
        var type = 'delete';
        var data = {_token: token};
        var functionName = "deleteRow";
        var modalName = "";
        var formName = "";
        var tableOrRowId = "#level" + levelId;
        var updateModalName = "";
        var message = "level deleted successfully";

        swal({
            title: "Alert",
            text: "Are you sure",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if(willDelete) {
                performAjaxRequest(url, type, data, modalName, message, functionName, formName, tableOrRowId, updateModalName);
            }
        })
    });


//   #################################js tree logics ###########################################
// generic process for storing checked boxes in jsonObject and sending it to the serve
   var jsonObject = [];

    $('#resources')
    // on the change event of js tree doing the required mechanism
        .on('changed.jstree', function (e, data) {
            // creating an array to hold the objects
            // creating variable without var to access it globally
             jsonObject = [];
            // invoking the loop i less than j condition which is i = 0 ; j = 1 and 0 < 1
            // j will increase as the user select the multiple check boxes.
            for (i = 0, j = data.selected.length; i < j; i++) {
           //    console.log(j);
                // creating an empty variable which will hold the object to use it for holding a
                // name value object {name : value}
                // reason for declaring it inside the loop is because i want to reinitialize its
                // value each time the loop runs
                 item = {};
                // getting the parent id of the selected node and if the user checked a controller
                // name then the parent id = # and we don't need it.
                var parentId = data.instance.get_node(data.selected[i]).parent;
                // ignoring the case of #
                if(parentId != "#")
                {
                    // creating the object where the value of the name "controller_name" is
                    // equal to the selected node's parent name i.e companyController
                    item["controller_name"] = $("#" + parentId + "_anchor").text().trim();
                    // storing the controllers action i.e index, create etc
                    item["controller_action"] = data.instance.get_node(data.selected[i]).text;
                    // also storing the selected node's id in order to make them checked while
                    // user wants to edit
                    item["node_id"] = data.instance.get_node(data.selected[i]).id;
                    // also storing the selected node's parent id in order to make them
                    // checked while user wants to edit
                    item["parent_id"] = parentId;
                    // company id
                    item["company_id"] = $("#company_id").val();
                    // pushing the values in array
                    jsonObject.push(item);
                }
            }

            if(jsonObject.length == 0)
            {
                $(".resourceError").text("Please Select Permissions");
            }
            else
            {
                $(".resourceError").text("");
            }
            // console.log(jsonObject);
        })
        .jstree();
   //####################################### end js tree logic ################### ///

    // by default hiding the separator and label for updateResources

    $("#separator").hide();
    $("#editResources").hide();
    $("#updateResourcesLabel").hide();

    // on click assign permission button storing the id of level in the data id attribute of #level-name to access
    // it from the modal and send with the json object
    $(document).on("click","#levelAssignButton",function () {
        $("#assignPermissionUpdateForm").attr("id","assignPermissionCreateForm");
        $("#assignPermission").text("Assign");
        $("#alert-text").hide();
        // getting level id
       var levelId   = $(this).data("id");
       // storing id in the attribute of #level-name
       $("#level-name").attr("data-id",levelId);
       // accessing the name from the table's <td> to show it in the modal field
       var levelName = $(this).closest('tr')["0"].cells["0"].innerHTML;
        var token = $('input[type="hidden"]').val();
       $("#level-name").val(levelName);

       $("#assignPermissionCreateForm").submit(function (e) {
           e.preventDefault();
          // var permissionId = $("#permission-name").val();
           if (jsonObject.length == 0) {
               swal("Error", "Please fill the form correctly", "error");
               $(".resourceError").text("Please Select Permissions");
           }
           else {
               loadingFunction();
               $(".assignPermissionError").text("");

                   $.ajax({
                       // this id is must with url if we do not send it in the url the logic written inside
                       // LevelController@assign method and in Level Model inside storeControllerAndAction method will
                       // be lost and permissions will not be assigned to the level. so be carefull
                       url: 'assign-level-permission/' + levelId,
                       type: 'post',
                       data: {jsonObject:jsonObject,_token:token},
                       success: function () {
                           // hidding the modal
                           $("#assignPermissionModal").modal("hide");
                           // i dont want to close the sweet alert by clicking outside i only want to close
                           // the sweet alert when user press okay thats why i used
                           // closeOnClickOutside: false.

                           swal({
                               title: "Success",
                               text: "Permissions assigned Successfully",
                               icon: "success",
                               closeOnClickOutside: false,
                           }).then((willDelete) => {
                               if(willDelete) {
                                   // using this method we can reidrect to a url
                                   // why i use this beacuase i want to reload the page when user assigned
                                   // permissions to the level because select 2 is not getting empty properly
                                   // after success also if the page is not refresh multiple calls sent
                                   // to the database for insertion (to avoid this)
                                   window.location.href = "permission";
                               }
                           })

                       }
                   });
           }
       })
       });

// on modal hide deselecting all selected check boxes its for both modal create and update
    $("#assignPermissionModal").on("hidden.bs.modal", function () {

        // i also have to hide here beacuse i m using the same modal
        $('#resources').jstree("deselect_all");
        // emptying the error message field.
        $(".resourceError").text("");
    });

    // on click of updateLevelAssingButton fetching the values against that level

    $(document).on("click","#updateLevelAssignButton",function () {

        // changing the form from create to update
        $("#assignPermissionCreateForm").attr("id", "assignPermissionUpdateForm");
        $("#assignPermission").text("Update");

        //getting level id
        var levelId = $(this).data("id");

        // accessing the name and levelPermsiion from the table's <td> to show it in the modal field
        var levelName = $(this).closest('tr')["0"].cells["0"].innerHTML;


        // storing id in the attribute of #level-name
        $("#level-name").attr("data-id", levelId);
        //showing in modal level name
        $("#level-name").val(levelName);
        // appenidng in editResources

        // on clicking the button deselecting all previously selected
       $('#resources').jstree("deselect_all");
        $.ajax({
            url:"level-permission/"+levelId,
            method:"get",
            success:function (data) {
                $.each(data,function (i,response) {
                    // in response we have the node id wiz comming from pivot table
                    // selecting all seleted nodes
                    $('#resources').jstree("select_node", response);
                    // close all
                    $('#resources').jstree('close_all');
                   // console.log(response);
                });

            }
        });

    });

// #################################### update permission  ####################  //

$(document).on("submit","#assignPermissionUpdateForm",function (e) {
    var levelId  = $(this).parentsUntil("#level-name").context[1].attributes[3].value;
    var token = $('input[type="hidden"]').val();
    e.preventDefault();
    if(jsonObject.length == 0)
    {
        swal("Error", "Please fill the form correctly", "error");
        $(".resourceError").text("Please Select Permissions");
    }
    else {
        loadingFunction();
        $(".resourceError").text("");
        $.ajax({
            url: "update-permission/" + levelId,
            type: "put",
            data: {jsonObject: jsonObject, _token: token},
            success: function (data) {
                $("#assignPermissionModal").modal("hide");
                // i dont want to close the sweet alert by clicking outside i only want to close
                // the sweet alert when user press okay thats why i used
                // closeOnClickOutside: false.

                swal({
                    title: "Success",
                    text: "Permissions updated Successfully",
                    icon: "success",
                    closeOnClickOutside: false,
                }).then((willDelete) => {
                    if(willDelete) {
                        // using this method we can reidrect to a url
                        // why i use this beacuase i want to reload the page when user assigned
                        // permissions to the level because select 2 is not getting empty properly
                        // after success also if the page is not refresh multiple calls sent
                        // to the database for insertion (to avoid this)
                        window.location.href = "permission";
                    }
                }
            )
            }
        });
    }
});


//    ############################## RESOURCES ####################
// create resources
    $("#resourceCreateForm").submit(function (e) {
        e.preventDefault();
        var token = $('input[type="hidden"]').val();
        if(jsonObject.length == 0)
        {
            swal("Error", "Please fill the form correctly", "error");
            $(".resourceError").text("Please Select Permissions");
        }
        else
        {
            loadingFunction();
            $(".resourceError").text("");
            $.ajax({
               url:"resource",
               type:"post",
               data:{jsonObject:jsonObject,_token:token},
               success:function () {
                   swal({
                       title: "Success",
                       text: "Resource Created Successfully",
                       icon: "success",
                       closeOnClickOutside: false,
                   }).then((willDelete) => {
                       if(willDelete) {
                           window.location.href = "resource";
                       }
                   })
               },
                error:function (error) {
                    if (error.status == 405)
                    {
                        window.location.href="/denied";
                    }
                }
            });
        }
    });
// delete resources
     $(document).on("click","#resourcesDeleteButton",function () {
         var id = $(this).attr("data-id");
         var token  = $('input[type="hidden"]').val();
         swal({
             title: "Are you sure?",
             text: "Once deleted, you will not be able to recover this! ",
             icon: "warning",
             buttons: true,
             dangerMode: true
         }).then((willDelete) => {
             if(willDelete) {
                 $.ajax({
                     url:'resource/'+id,
                     method:"delete",
                     data:{_token:token},
                     success: function (data) {
                         swal("deleted!", "resource deleted successfully!", "success");
                         $("#resource"+id).remove();
                     },
                     error:function (error) {
                         if (error.status == 405)
                         {
                             window.location.href="/denied";
                         }
                     }
                 });
             }
         })
     });
// ####################################### Strategy #################### \\
    $(document).on("click", ".displayStrategy", function () {
        // on click removing the content from the table's body
        $("#ks-datatable tbody").html("");
        var visionId = $(this).data("id");
        var url = 'strategies/' + visionId;
        var type = 'get';
        var data = "";
        var functionName = "populateStrategyTable";
        var modalName = "";
        var formName = "";
        var tableOrRowId = "";
        var updateModalName = "";
        var message = "";

        //  calling generic ajax function
        performAjaxRequest(url, type, data, modalName, message, functionName, formName, tableOrRowId, updateModalName);
    });

    //making start date and end end data fields for strategy hidden
    $("#strategyStartDateDiv").hide();
    $("#strategyEndDateDiv").hide();

    function validateSelectVision() {
        var selectedVisionId = $("#visionDropDown").val();
        {
            if (selectedVisionId == "")
            {
                $("#visionDropDown").css({"border": "1px solid red",});
                $(".selectVisionError").text("Please select a vision");
                $("#strategyStartDateDiv").hide();
                $("#strategyEndDateDiv").hide();
            }
            else
            {
                // if the user select the vision then the start date and end date will be show to him
                $("#visionDropDown").css({"border": "1px solid green",});
                $(".selectVisionError").text("");
                $("#strategyStartDateDiv").show();
                $("#strategyEndDateDiv").show();
            }
        }
    }

    //function to fetch start date and end date of the vision that the user selected
    // so that we can restrict user from creating a strategy lower than or higher than vision date

    function fetchVisionDate() {

        var selectedVisionId = $("#visionDropDown").val();
        if (selectedVisionId != "")
        {
            //ajax call for fetching dates for the selected vision
            $.ajax({
                url:'vision/'+selectedVisionId+'/date',
                method:'get',
                success:function (data) {
                    // on response destroying the datepicker else it does not pick the next
                    // value instead it displays the range of previously selected range
                    $('#strategyStartDate').datepicker('destroy');
                    $('#strategyEndDate').datepicker('destroy');

                    // setting the maximum and minimum dates for the strategy
                    // (should not be greater than the start and end date of vision
                    // also changing the placeholder with the vision's start and end date.)
                    // console.log(data);
                    $( "#strategyStartDate" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: new Date(data.start_date),
                        maxDate: new Date(data.end_date)
                    }).attr("placeholder","vision start date is "+ (data.start_date).slice(0,10));

                    $( "#strategyEndDate" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: new Date(data.start_date),
                        maxDate: new Date(data.end_date)
                    }).attr("placeholder","vision end date is " + (data.end_date).slice(0,10));
                }
            });
            return false;
        }
        else
        {
            return true;
        }
    }
    // Create Strategy Validation
    $("#visionDropDown").blur(function () {
        validateSelectVision();
    });

    // calling the fetch vision date  function on change event of select tag
    $("#visionDropDown").change(function () {
        fetchVisionDate();
        validateSelectVision();
    });

    // function to validate strategy name
    function validateStrategyName() {
        var strategyName = $("#strategyName").val();
        if (strategyName == "" || (/^[0-9]*$/g.test(strategyName))) {
            $("#strategyName").css({
                "border": "1px solid red",
            });

            $(".strategyNameError").text("Please Enter A Valid Name");
            return true;
        }

        else {
            $("#strategyName").css({
                "border": "1px solid green",
            });
            $(".strategyNameError").text("");
            return false;
        }
    }

    // on blur
    $("#strategyName").blur(function () {
        validateStrategyName();
    });
    //   on focus
    $("#strategyName").focus(function () {
        $("#strategyName").css({
            "border": "1px solid",
        });
    });

    // function to validate strategy description
    function validateStrategyDescription() {
        var strategyDescription = $("#strategyDescription").val();
        if (strategyDescription == "") {
            $("#strategyDescription").css({
                "border": "1px solid red",
            });

            $(".strategyDescriptionError").text("Please Enter A Description");
            return true;
        }

        else {
            $("#strategyDescription").css({
                "border": "1px solid green",
            });
            $(".strategyDescriptionError").text("");
            return false;
        }
    }

    // on blur
    $("#strategyDescription").blur(function () {
        validateStrategyDescription();
    });
    //   on focus
    $("#strategyDescription").focus(function () {
        $("#strategyDescription").css({
            "border": "1px solid",
        });
    });

    // function to validate strategy target
    // function validateStrategyTarget() {
    //     var strategyTarget = $("#strategyTarget").val();
    //     if (strategyTarget == "" || (!/^[0-9]*$/g.test(strategyTarget))) {
    //         $("#strategyTarget").css({
    //             "border": "1px solid red",
    //         });
    //         $(".strategyTargetError").text("Please Enter valid numbers");
    //         return true;
    //     }
    //     else {
    //         $("#strategyTarget").css({
    //             "border": "1px solid green",
    //         });
    //         $(".strategyTargetError").text("");
    //         return false;
    //     }
    // }

    // on blur
    // $("#strategyTarget").blur(function () {
    //     validateStrategyTarget();
    // });
    //   on focus
    // $("#strategyTarget").focus(function () {
    //     $("#strategyTarget").css({
    //         "border": "1px solid",
    //     });
    // });

    // function to validate strategyStartDate
    function validateStrategyStartDate() {
        var strategyStartDate = $("#strategyStartDate").val();
        if (strategyStartDate == "")
        {
            $("#strategyStartDate").css({"border": "1px solid red",});
            $(".strategyStartDateError").text("Please Enter valid Start Date");
            return true;
        }
        else
        {
            $("#strategyStartDate").css({"border": "1px solid green",});
            $(".strategyStartDateError").text("");
            return false;
        }
    }
    //   on change
    $("#strategyStartDate").change(function () {
        $("#strategyStartDate").css({
            "border": "1px solid",
        });
        validateStrategyStartDate();

    });

    // function to validate strategy end date
    function validateStrategyEndDate() {
        var strategyEndDate = $("#strategyEndDate").val();
        if (strategyEndDate == "")
        {
            $("#strategyEndDate").css({"border": "1px solid red",});
            $(".strategyEndDateError").text("Please Enter valid End Date");
            return true;
        }
        else
        {
            $("#strategyEndDate").css({"border": "1px solid green",});
            $(".strategyEndDateError").text("");
            return false;
        }
    }
    //   on change
    $("#strategyEndDate").change(function () {
        $("#strategyEndDate").css({
            "border": "1px solid",
        });
        validateStrategyEndDate();
    });

    // create modal hide clearing the modal
    $('#createStrategyModal').on('hidden.bs.modal', function(){
        $("#strategyName,#strategyDescription," +
                //#strategyTarget,
            "#strategyStartDate,#strategyEndDate").css({
            "border": "1px solid",
        });
    });

    //strategy create process
    $("#strategyCreateForm").submit(function (e) {
        e.preventDefault();
       if (validateSelectVision() || validateStrategyName() || validateStrategyDescription() ||
           validateStrategyStartDate() || validateStrategyEndDate())
       // validateStrategyTarget() ||
       {
           swal("Error","Please fill the form correctly","error");
           validateSelectVision();
           validateStrategyName();
           validateStrategyDescription();
           // validateStrategyTarget();
           validateStrategyStartDate();
           validateStrategyEndDate()
       }
       else
       {
           var visionId        = $('#visionDropDown :selected').val();
           var strategyName    = $("#strategyName").val();

           $.ajax({
               // intentionally sending data to edit route because this route is of no user
               url: "isExist/" + strategyName + "/" + visionId,
               type: "get",
               success: function (response) {
                   // 1 means that level name exist
                   if (response > 0) {
                       $(".strategyNameError").html("This name has already been taken").css({
                           "color": "red",
                           "font-size": "12px"

                       });
                   }
                   else {

                       var visionId = $('#visionDropDown :selected').val();
                       // var strategyTarget = $("#strategyTarget").val();
                       var strategyDescription = $("#strategyDescription").val();
                       var strategyStartDate = $("#strategyStartDate").val();
                       var strategyEndDate = $("#strategyEndDate").val();
                       var token = $('input[type="hidden"]').val();
                       var url = 'strategy';
                       var type = 'post';
                       var data = {
                           visionId: visionId, strategyName: strategyName,
                           strategyDescription: strategyDescription, strategyStartDate: strategyStartDate,
                           strategyEndDate: strategyEndDate, _token: token
                           // strategyTarget: strategyTarget,
                       };
                       var functionName = "appendStrategyRow";
                       var modalName = "#createStrategyModal";
                       var formName = "#strategyCreateForm";
                       var tableOrRowId = "#ks-datatable";
                       var updateModalName = "#updateStrategyModal";
                       var message = "Strategy created successfully";

                       performAjaxRequest(url, type, data, modalName, message, functionName, formName, tableOrRowId, updateModalName);
                   }
               }
       });
       }
    });

    // strategy deletion
    $(document).on("click",".deleteStrategyLink",function () {
        var id = $(this).attr("data-id");
        var token  = $('input[type="hidden"]').val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this! ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url:'strategy/'+id,
                    method:"delete",
                    data:{_token:token},
                    success: function (data) {
                        swal("deleted!", "strategy deleted successfully!", "success");
                        $("#strategy"+id).remove();
                    },
                    error:function (error) {
                        if (error.status == 405)
                        {
                            window.location.href="/denied";
                        }
                    }
                });
            }
        })
    });

    // validation for update strategy

    function validateUpdateStrategyName() {
        var updateStrategyName = $("#updateStrategyName").val();
        if (updateStrategyName == "" || (/^[0-9]*$/g.test(updateStrategyName))) {
            $("#updateStrategyName").css({
                "border": "1px solid red",
            });

            $(".updateStrategyNameError").text("Please Enter A Valid Name");
            return true;
        }

        else {
            $("#updateStrategyName").css({
                "border": "1px solid green",
            });
            $(".updateStrategyNameError").text("");
            return false;
        }
    }

    // on blur
    $("#updateStrategyName").blur(function () {
        validateUpdateStrategyName();
    });
    //   on focus
    $("#updateStrategyName").focus(function () {
        $("#updateStrategyName").css({
            "border": "1px solid",
        });
    });

    // function to validate strategy description
    function validateUpdateStrategyDescription() {
        var updateStrategyDescription = $("#updateStrategyDescription").val();
        if (updateStrategyDescription == "") {
            $("#updateStrategyDescription").css({
                "border": "1px solid red",
            });

            $(".updateStrategyDescriptionError").text("Please Enter A Description");
            return true;
        }

        else {
            $("#updateStrategyDescription").css({
                "border": "1px solid green",
            });
            $(".updateStrategyDescriptionError").text("");
            return false;
        }
    }

    // on blur
    $("#updateStrategyDescription").blur(function () {
        validateUpdateStrategyDescription();
    });
    //   on focus
    $("#updateStrategyDescription").focus(function () {
        $("#updateStrategyDescription").css({
            "border": "1px solid",
        });
    });

    // function to validate strategy target
    // function validateUpdateStrategyTarget() {
    //     var updateStrategyTarget = $("#updateStrategyTarget").val();
    //     if (updateStrategyTarget == "" || (!/^[0-9]*$/g.test(updateStrategyTarget))) {
    //         $("#updateStrategyTarget").css({
    //             "border": "1px solid red",
    //         });
    //         $(".updateStrategyTargetError").text("Please Enter valid numbers");
    //         return true;
    //     }
    //     else {
    //         $("#updateStrategyTarget").css({
    //             "border": "1px solid green",
    //         });
    //         $(".updateStrategyTargetError").text("");
    //         return false;
    //     }
    // }

    // on blur
    // $("#updateStrategyTarget").blur(function () {
    //     validateUpdateStrategyTarget();
    // });
    //   on focus
    // $("#updateStrategyTarget").focus(function () {
    //     $("#updateStrategyTarget").css({
    //         "border": "1px solid",
    //     });
    // });

    // function to validate strategyStartDate
    function validateUpdateStrategyStartDate() {
        var updateStrategyStartDate = $("#updateStrategyStartDate").val();
        if (updateStrategyStartDate == "")
        {
            $("#updateStrategyStartDate").css({"border": "1px solid red",});
            $(".updateStrategyStartDateError").text("Please Enter valid Start Date");
            return true;
        }
        else
        {
            $("#updateStrategyStartDate").css({"border": "1px solid green",});
            $(".updateStrategyStartDateError").text("");
            return false;
        }
    }
    //   on change
    $("#updateStrategyStartDate").change(function () {
        $("#updateStrategyStartDate").css({
            "border": "1px solid",
        });
        validateUpdateStrategyStartDate();

    });

    // function to validate strategy end date
    function validateUpdateStrategyEndDate() {
        var updateStrategyEndDate = $("#updateStrategyEndDate").val();
        if (updateStrategyEndDate == "")
        {
            $("#updateStrategyEndDate").css({"border": "1px solid red",});
            $(".updateStrategyEndDateError").text("Please Enter valid End Date");
            return true;
        }
        else
        {
            $("#updateStrategyEndDate").css({"border": "1px solid green",});
            $(".updateStrategyEndDateError").text("");
            return false;
        }
    }
    //   on change
    $("#updateStrategyEndDate").change(function () {
        $("#updateStrategyEndDate").css({
            "border": "1px solid",
        });
        validateUpdateStrategyEndDate();
    });

// edit modal hide clearing the modal
    $('#updateStrategyModal').on('hidden.bs.modal', function(){
        $("#visionDropDown,#updateStrategyName,#updateStrategyDescription," +
            // #updateStrategyTarget,
            "#updateStrategyStartDate,#updateStrategyEndDate").css({
            "border": "1px solid",
        });
    });

// edit strategy
    $(document).on("click",".editStrategyLink",function () {
        var strategyId            = $(this).data("id");
        var visionId              = $(this).data("vision");
        var strategyName          = $(this).closest("tr")["0"].cells["0"].innerHTML;
        var strategyDescription   = $(this).closest("tr")["0"].cells["1"].innerHTML;
        // var strategyTarget        = $(this).closest("tr")["0"].cells["2"].innerHTML;
        var strategyStartDate     = $(this).closest("tr")["0"].cells["2"].innerHTML;
        var strategyEndDate       = $(this).closest("tr")["0"].cells["3"].innerHTML;
        var strategyStatus        = $(this).closest("tr")["0"].cells["4"].innerHTML;
        var strategyRemainingTime = $(this).closest("tr")["0"].cells["5"].innerHTML;

        $("#updateStrategyName").val(strategyName);
        $("#updateStrategyDescription").val(strategyDescription);
        // $("#updateStrategyTarget").val(strategyTarget);
        $("#updateStrategyStartDate").val(strategyStartDate);
        $("#updateStrategyEndDate").val(strategyEndDate);

        // ajax call fro fetching dates
        $.ajax({
            url:'vision/'+visionId+'/date',
            method:'get',
            success:function (data) {
                // on response destroying the datepicker else it does not pick the next
                // value instead it displays the range of previously selected range
                $('#updateStrategyStartDate').datepicker('destroy');
                $('#updateStrategyEndDate').datepicker('destroy');

                // setting the maximum and minimum dates for the strategy
                // (should not be greater than the start and end date of vision
                // also changing the placeholder with the vision's start and end date.)
                $( "#updateStrategyStartDate" ).datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: new Date(data.start_date),
                    maxDate: new Date(data.end_date)
                }).attr("placeholder","vision start date is "+ (data.start_date).slice(0,10));

                $( "#updateStrategyEndDate" ).datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: new Date(data.start_date),
                    maxDate: new Date(data.end_date)
                }).attr("placeholder","vision end date is " + (data.end_date).slice(0,10));
            }
        });

        //strategy update process
        $("#strategyUpdateForm").submit(function (e) {
            e.preventDefault();
            if (validateUpdateStrategyName() || validateUpdateStrategyDescription() ||
               validateUpdateStrategyStartDate() || validateUpdateStrategyEndDate())
            //  validateUpdateStrategyTarget() ||
            {
                swal("Error","Please fill the form correctly","error");
                validateUpdateStrategyName();
                validateUpdateStrategyDescription();
                // validateUpdateStrategyTarget();
                validateUpdateStrategyStartDate();
                validateUpdateStrategyEndDate()
            }
            else
            {
                var strategyName        = $("#updateStrategyName").val();
                // var strategyTarget      = $("#updateStrategyTarget").val();
                var strategyDescription = $("#updateStrategyDescription").val();
                var strategyStartDate   = $("#updateStrategyStartDate").val();
                var strategyEndDate     = $("#updateStrategyEndDate").val();
                var token               = $('input[type="hidden"]').val();
                var url = 'strategy/'+strategyId;
                var type = 'put';
                var data = {
                    visionId:visionId,strategyStatus:strategyStatus,
                    strategyRemainingTime:strategyRemainingTime,
                    strategyId: strategyId,strategyName:strategyName,
                    strategyDescription: strategyDescription,strategyStartDate:strategyStartDate,
                    strategyEndDate:strategyEndDate, _token: token
                    // strategyTarget:strategyTarget,
                };
                var functionName    = "updateStrategyRow";
                var modalName       = "#updateStrategyModal";
                var formName        = "#strategyUpdateForm";
                var tableOrRowId    = "#strategy"+strategyId;
                var updateModalName = "#updateStrategyModal";
                var message         = "Strategy updated successfully";

                performAjaxRequest(url,type,data,modalName,message,functionName,formName,tableOrRowId,updateModalName);

            }
        });
    });

// assign strategy to user
    $(document).on('click',".assignUserLink",function () {
        var strategyId            = $(this).data("id");
        var strategyName          = $(this).closest("tr")["0"].cells["0"].innerHTML;

        // // putting values in strategy field dynamically
        $("#functionality-name").val(strategyName);
        $("#functionality-name").attr("data-id",strategyId);


    });

    // function to validate assign user
    function validateAssignUsers() {

        var assignUser = $("#assignUser").val();

        // validation for assigned privileges
        if (assignUser == null ) {
            $(".select2-container--default .select2-selection--multiple").css({
                "border": "1px solid red",
            });

            $(".assignUserError").html("Please assign users").css({
                "font-size": "15px",
                "color": "red",
            });
            return true
        }
        else {
            $(".select2-container--default .select2-selection--multiple").css({
                "border": "1px solid #CCCCCC",
            });
            $(".assignUserError").empty();
            return false;
        }
    }

    // on change for select 2, focus and blur do not work instead we have to use on change event
    // we can use id here or directly can write select
    $('#assignUser').on('change', function() {
        validateAssignUsers();
    });

    // $('#assignUserModal').on('hidden.bs.modal', function(){
    //     // it will empty the select 2 filed which was not happening with form reset.
    //     $(".select2-selection__rendered > li").remove();
    //     $('#assignUser').val(null).trigger('change');
    // });

//  assign user process

 $("#assignUserForm").submit(function (e) {
     e.preventDefault();
     if (validateAssignUsers())
     {
         validateAssignUsers();
         swal("Error","please fill the form correctly","error");
     }

      else
     {
         // calling the loading function for loader
         loadingFunction();
         // $("#assignUser").val() contains the id's of users
         var assignedUserIds    = $("#assignUser").val();
         // Note because this is generic function for user assignement
         // thats why this is the id of functionality (vision, strategy, goal, kpi) it could be anyone of them
         var functionalityId    = $("#functionality-name").data("id");
         var functionalityName  = $(".assignUserLink").data("name");
         var loggedInUser  = $("#logged-in-user").val();
         // var loggedInUser       = 3;
         var token              = $('input[type="hidden"]').val();

         $.ajax({
            url:"assign-users",
            method:"post",
            data:{assignedUserIds:assignedUserIds,functionalityId:functionalityId,
                functionalityName:functionalityName,loggedInUser:loggedInUser,_token:token},
            success:function () {
                swal({
                    title: "Success",
                    text: "User Assigned Successfully",
                    icon: "success",
                    // timer: 4000,
                    closeOnClickOutside: false,
                }).then((willDelete) => {
                    if(willDelete) {
                        window.location.href = "assign-"+functionalityName+"-view";
                    }
                })
            },
             error:function (error) {
                 if (error.status == 405)
                 {
                     window.location.href="/denied";
                 }
             }
         });
     }
 });

// update assign strategy to user
    $(document).on('click',".updateAssignUserLink",function () {
        var usersId               = [];         // to store users id (assigned users)
        // functionalityId is generic it could be strategyId , visionId depends on the page you are on.
        var functionalityId       = $(this).data("id");
        var functionalityName     = $(this).closest("tr")["0"].cells["0"].innerHTML;
        var multiSelectValues     = $(".js-example-basic-multiple");
        // name of the functionality vision,strategy, kpi etc
        // var functionality         = $("#functionality").val();
        var functionality         = $(this).data("name");
        // putting values in strategy field dynamically
        $("#update-functionality-name").val(functionalityName);
        $("#update-functionality-name").attr("data-id",functionalityId);

        // ajax call to fetch assigned users id
        $.ajax({
            // route automatically becomes generic just need to pass functionality name
            url:"assignedUsers/"+functionalityId,
            method:"get",
            data:{functionality:functionality},
            success:function (response) {

                // only showing data in the output field if the data is available
                if(response != "")
                {
                    $.each(response,function (i,data) {
                        // pushing data into array
                        // data.id is the id of user against a particular functionlaityId
                        usersId.push(data.id);
                    });
                    // using select 2 to display the selected values in the search box
                    // without trigger("change") it wont work
                    multiSelectValues.val(usersId).trigger("change");
                }
                else
                {
                    $(".select2-container--default .select2-selection--multiple").css({
                        "border": "1px solid #CCCCCC",
                    });
                }
            }
        });
    });

// validation for update assigned permissions
    // function to validate assign user
    function validateUpdatedAssignUsers() {

        var updateAssignUser = $("#updateAssignUser").val();

        // validation for assigned privileges
        if (updateAssignUser == null ) {
            $(".select2-container--default .select2-selection--multiple").css({
                "border": "1px solid red",
            });

            $(".updateAssignUserError").html("Please assign users").css({
                "font-size": "15px",
                "color": "red",
            });
            return true
        }
        else {
            $(".select2-container--default .select2-selection--multiple").css({
                "border": "1px solid #CCCCCC",
            });
            $(".updateAssignUserError").empty();
            return false;
        }
    }

    // on change for select 2, focus and blur do not work instead we have to use on change event
    // we can use id here or directly can write select
    $('#updateAssignStrategyUser').on('change', function() {
        validateUpdatedAssignUsers();
    });

// assign user process

    $("#updateAssignUserForm").submit(function (e) {
        e.preventDefault();
        if (validateUpdatedAssignUsers())
        {
            validateUpdatedAssignUsers();
            swal("Error","please fill the form correctly","error");
        }

        else
        {
            loadingFunction();
            var reAssignedUsersIds  = $("#updateAssignUser").val();
            var functionalityId     = $("#update-functionality-name").data("id");
            var functionalityName   = $(".updateAssignUserLink").data("name");
             var loggedInUser  = $("#logged-in-user").val();
            // var loggedInUser        = 3;
            var token               = $('input[type="hidden"]').val();
            $.ajax({
                url:"update-assigned-users",
                method:"put",
                data:{reAssignedUsersIds:reAssignedUsersIds,functionalityId:functionalityId,
                    functionalityName:functionalityName,loggedInUser:loggedInUser,_token:token},
                success:function (data) {
                    swal({
                        title: "Success",
                        text: "User Re Assigned Successfully",
                        icon: "success",
                        closeOnClickOutside: false,
                    }).then((willDelete) => {
                        if(willDelete) {
                            window.location.href = "assign-"+functionalityName+"-view";
                        }
                    })
                },
                error:function (error) {
                    if (error.status == 405)
                    {
                        window.location.href="/denied";
                    }
                }
            });
        }
    });

    // creating an array of badgeColors
    var badgeColors = ["info", "success", "warning", "danger", "purple", "primary"];
    // hiding the text
    $("#hideAndShow").hide();
    // approve and disapprove comments
    $(".displayGoalDataDetails").click(function () {
        var userId = $(this).data("id");
        var goalId = $(this).data("goal");

        $.ajax({
           url:"goal-user-details/"+userId+"/"+goalId,
            type:"get",
            success:function (response) {
               // emptying the table on every response
               $("#appendDetails").html("");
                $.each(response["goalData"],function(i,data){
                    $("#hideAndShow").show();
                   $("#appendDetails").append(
                       '<div class="ks-crm-user-view-activity-item" >' +
                       '<div class="ks-crm-user-view-activity-item-badge" >' +
                       '<span class="badge ks-circle badge-'+badgeColors[Math.floor((Math.random() * 5) + 0)]+'"></span></div>' +
                       '<div class="ks-crm-user-view-activity-item-date">'+(new Date(data.data_entry_date)).toDateString()+'</div>' +
                       '<div class="ks-crm-user-view-activity-item-action">' +
                       '<div class="ks-crm-user-view-activity-item-action-name">' +
                       '<span class="ks-icon la la-check-circle-o"></span>' +
                       '<span class="ks-text text-success">Target  = '+response["goal"].target+'</span>&nbsp;&nbsp;&nbsp;' +
                       '<span class="ks-text text-warning">Achieved = '+data.actual_data+'</span>&nbsp;&nbsp;&nbsp;' +
                       '<button class="btn btn-outline-danger ks-no-text ks-solid location_details" ' +
                       'data-id="'+data.id+'" data-user="'+userId+'"  data-toggle="modal" data-target="#myModal">' +
                       "<span class='la la-map-marker ks-icon'></span></button>" +
                       '</div>' +
                       '<div class="ks-crm-user-view-activity-item-action-description">'+data["comment"]+'</div>' +
                       '<div class="ks-crm-user-view-activity-item-action-time text-primary">'+moment(data.data_entry_date).from(moment())+'</div></div></div></br>'
                   );
                });
                appendGraph(response);
            }
        });
    });



// fetch data by searched date from goal data table
    $("#hideAndShows").hide();
    $("#searchByDate").submit(function (e) {
        e.preventDefault();
        if($("#search").val() == "")
        {
            $("#search").css({
               "border":"1px solid red",
            });
            swal("Error","Please Choose A Date First","error");
        }
        else
        {
            $("#search").css({"border":"1px solid green"});
            var searcedDate = $("#search").val();
            // ajax call
            $.ajax({
               url:"goal-data-details/" + searcedDate,
                type:"get",
                success:function(response){
                    // emptying the html on every response
                    $("#appendDateDetails").html("");
                   if (response != "") {
                       $.each(response, function (i, data) {
                           $("#hideAndShows").show();
                           $("#hideAndShows").html("Daily Details");
                           $("#appendDateDetails").append(
                               '<div class="ks-crm-user-view-activity-item" >' +
                               '<div class="ks-crm-user-view-activity-item-badge" >' +
                               '<span class="badge ks-circle badge-' + badgeColors[Math.floor((Math.random() * 5) + 0)] + '"></span></div>' +
                               '<div class="ks-crm-user-view-activity-item-date">' + data["userName"] + '</div>' +
                               '<div class="ks-crm-user-view-activity-item-action">' +
                               '<div class="ks-crm-user-view-activity-item-action-name">' +
                               '<span class="ks-icon la la-check-circle-o"></span>' +
                               '<span class="ks-text text-danger">Goal  = ' + data["goalName"] + '</span>&nbsp;&nbsp;&nbsp;' +
                               '<span class="ks-text text-success">Target  = ' + data["goalTarget"] + '</span>&nbsp;&nbsp;&nbsp;' +
                               '<span class="ks-text text-warning">Achieved = ' + data["TargetAchieved"] + '</span>&nbsp;&nbsp;&nbsp;' +
                               '<button class="btn btn-outline-danger ks-no-text ks-solid location_details" ' +
                               'data-id="'+data["goalDataId"]+'" data-user="'+data["goalDataUserId"]+'"  data-toggle="modal" data-target="#myModal">' +
                               "<span class='la la-map-marker ks-icon'></span></button>" +
                               '</div>' +
                               '<div class="ks-crm-user-view-activity-item-action-description">'+data["comment"]+'</div>' +
                               '<div class="ks-crm-user-view-activity-item-action-time text-primary">' + moment(searcedDate).from(moment()) + '</div></div></div></br>'
                           );
                       });
                   }
                   else
                   {
                       $("#hideAndShows").html("No Data Found");
                       $("#hideAndShows").show();
                   }
                }
            });
        }
    });

    // creating approve and disapprove system
    $(".approveDataButton").click(function () {
        // getting the values form the data attributes
        var goalDataId      = $(this).data("id");
        var userId          = $(this).data("user");
        var actualEntryDate = $(this).data("date");

        // seeting the data attributes of createApprovedDataCommentButton
        $('#createApprovedDataCommentButton').attr('data-id',goalDataId);
        $('#createApprovedDataCommentButton').attr('data-user',userId);
        $('#createApprovedDataCommentButton').attr('data-date',actualEntryDate);
    });

    // creating approve and disapprove system
    $(".disApproveDataButton").click(function () {
        // getting the values form the data attributes
        var goalDataId      = $(this).data("id");
        var userId          = $(this).data("user");
        var actualEntryDate = $(this).data("date");

        // seeting the data attributes of createApprovedDataCommentButton
        $('#createDisApprovedDataCommentButton').attr('data-id',goalDataId);
        $('#createDisApprovedDataCommentButton').attr('data-user',userId);
        $('#createDisApprovedDataCommentButton').attr('data-date',actualEntryDate);

        $.ajax({
            url:"block-user/"+userId+"/"+goalDataId,
            type:"get",
            success:function(response)
            {
                if (response >= 3)
                {
                    $('#createDisApprovedDataCommentButton')[0].firstChild.nodeValue = "Block And Send"
                }
                else
                {
                    $('#createDisApprovedDataCommentButton')[0].firstChild.nodeValue = "Send"
                }
            }
        });
    });

    // creating approve and disapprove form submission
    // approved form
    $("#approveDataForm").submit(function (e) {
        e.preventDefault();
        if ($("#approvedData").val() == "")
        {
            swal("Error","Please Enter Comment", "error");
        }
        else
        {
            // calling the loading function for loader
            loadingFunction();
            var comment     = $("#approvedData").val();
            var goalDataId  = $("#createApprovedDataCommentButton").data("id");
            var userId      = $("#createApprovedDataCommentButton").data("user");
            var actualDate  = $("#createApprovedDataCommentButton").data("date");
            var token  = $('input[type="hidden"]').val();

            $.ajax({
                url:"data-approve",
                type:"post",
                data:{goalDataId:goalDataId,userId:userId,actualDate:actualDate,
                    comment:comment,string:"approve",_token:token},
                success:function(){
                    $("#hide-approve").hide();
                    var approvedDiv = $("#"+goalDataId).clone();
                    $('.approvedDiv').prepend(approvedDiv);
                    $('.approvedDiv .approveDataButton').remove();
                    $(".approvedDiv .disApproveDataButton").remove();
                    $("#"+goalDataId).remove();
                    $("#approveDataForm")[0].reset();
                    $("#approveDataModal").modal("hide");
                    swal("Success","Email Has Been Send To The User", "success");
                }
            });
        }
    });

    // disapproved form
    $("#disApproveDataForm").submit(function (e) {
        e.preventDefault();
        if ($("#disApprovedData").val() == "")
        {
            swal("Error","Please Enter Comment", "error");
        }
        else
        {
            // calling the loading function for loader
            loadingFunction();
            var comment     = $("#disApprovedData").val();
            var goalDataId  = $("#createDisApprovedDataCommentButton").data("id");
            var userId      = $("#createDisApprovedDataCommentButton").data("user");
            var actualDate  = $("#createDisApprovedDataCommentButton").data("date");
            var blockStatus = $('#createDisApprovedDataCommentButton')[0].firstChild.nodeValue;
            var token  = $('input[type="hidden"]').val();
            $.ajax({
                url:"data-approve",
                type:"post",
                data:{goalDataId:goalDataId,userId:userId,actualDate:actualDate,
                    comment:comment,string:"unApprove",_token:token,blockStatus:blockStatus},
                success:function(){
                    $("#hide-rejected").hide();
                    var rejectedDiv = $("#"+goalDataId).clone();
                    $('.rejectedDiv').prepend(rejectedDiv);
                    $('.rejectedDiv .approveDataButton').remove();
                    $(".rejectedDiv .disApproveDataButton").remove();
                    $("#"+goalDataId).remove();
                    $("#disApproveDataForm")[0].reset();
                    $("#disApproveDataModal").modal("hide");
                    swal("Success","Email Has Been Send To The User", "success");
                }
            });
        }
    });

    // un blocking the user
    $("#unblock").click(function () {
        loadingFunction();
        var userId = $(this).data("user");
       $.ajax({
           url:"unblock/"+userId,
           method:"get",
           success:function(response){
                $("#user"+userId).remove();
               swal("Success", "User Unblocked Successfully", "success");
           }
       })
    });
    // showing the location of the user
    $(document).on("click",".location_details",function () {
        var LocsA = [];
        var goalDataId     = $(this).data("id");
        var goalDataUserId = $(this).data("user");
        $.ajax({
            url: "user-location/"+goalDataUserId+"/"+goalDataId,
            method:"get",
            success:function (response) {
                if (response != "")
                {
                    $.each(response,function (i,data) {
                        LocsA.push({
                            lat: data.latitude,
                            lon: data.longitude,
                            title:data.city_name,
                            icon: 'http://maps.google.com/mapfiles/marker.png',
                        });
                    });
                    new Maplace({
                        locations: LocsA,
                        map_div: '#gmap-dropdown',
                    }).Load();
                }
                else
                {
                    $("#location-hide-show").show();
                }
            }
        });
    });

    $('#goal_line_chart_toggle').hide();
    // function to populate the graph of activities
    function appendGraph(response) {

        var counter = 0;
        var goal_target = parseInt(response["goal"].target);
        var goaldatas = response["goalData"];
        $.each(goaldatas,function (i,data) {
            counter++;
        });
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {'packages': ['corechart']});
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart);
        var data_dates = [];
        var actual_data = [];
        var left_actual_data = [];
        var total_actual_data = 0;
        var total_left_data = parseInt(response["goal"].target) * counter;

        $.each(goaldatas,function (i,data) {
            data_dates[i] = data.data_entry_date.slice(0,10);
            actual_data[i] = data.actual_data;
            if ($.isNumeric(actual_data[i]))
            {
                left_actual_data[i] = parseInt(response["goal"].target) - parseInt(actual_data[i]);
                if (actual_data[i] != 0)
                {
                    total_actual_data += parseInt(actual_data[i]);
                }
            }
        });
        total_left_data -= parseInt(total_actual_data);

        function drawChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Date');
            data.addColumn('number', 'Actual');
            data.addColumn('number', 'Target');
            $.each(goaldatas,function (i,response) {
                data.addRows([
                    [data_dates[i] , actual_data[i], goal_target],
                ]);
            });

            var options = {
                title: 'Goal Performance',
                width:800,
                height:300,
                pointSize:5,
                curveType: 'function',
                legend: { position: 'bottom' },
                hAxis: {
                    title: 'Daily Work',
                },
                vAxis: {
                    title: 'Actual Work Done',
                },
                colors: ['#227830','#DC1030']
            };
            $('#goal_line_chart_toggle').show();
            var chart = new google.visualization.LineChart(document.getElementById('goal_curve_chart_details'));
            chart.draw(data, options);
        }

    }






























































































































































































































































































































    /*
         =================================================================
                 Zeeshan Work
         =================================================================
         */
    // ####################################### Strategy #################### \\
    $(document).on("click", ".displayKPI", function () {
        // on click removing the content from the table's body
        $("#ks-datatable tbody").html("");
        var strategyId = $(this).data("id");
        var kpiUrl = 'kpis/' + strategyId;
        var methodType = 'get';
        var kpiData = "";
        var methodName = "populateKPITable";
        var modal_name = "";
        var form_name = "";
        var table_Or_RowId = "";
        var update_Modal_Name = "";
        var massage = "";

        //  calling generic ajax function
        performAjaxRequest(kpiUrl, methodType, kpiData, modal_name, massage, methodName, form_name, table_Or_RowId, update_Modal_Name);
    });

    //making start date and end end data fields for strategy hidden
    $("#kpiStartDateDiv").hide();
    $("#kpiEndDateDiv").hide();

    function validateSelectStrategy() {
        var selectedStrategyId = $("#strategyDropDown").val();
        {
            if (selectedStrategyId == "")
            {
                $("#strategyDropDown").css({"border": "1px solid red",});
                $(".selectStrategyError").text("Please select a vision");
                $("#kpiStartDateDiv").hide();
                $("#kpiEndDateDiv").hide();
            }
            else
            {
                // if the user select the vision then the start date and end date will be show to him
                $("#strategyDropDown").css({"border": "1px solid green",});
                $(".selectStrategyError").text("");
                $("#kpiStartDateDiv").show();
                $("#kpiEndDateDiv").show();
            }
        }
    }

    //function to fetch start date and end date of the vision that the user selected
    // so that we can restrict user from creating a strategy lower than or higher than vision date

    /*function fetchStrategyDate() {

        var selectedStrategyId = $("#strategyDropDown").val();
        if (selectedStrategyId != "")
        {
            //ajax call for fetching dates for the selected vision
            $.ajax({
                url:'strategy/'+selectedStrategyId+'/date',
                method:'get',
                success:function (data) {
                    // setting the maximum and minimum dates for the strategy
                    // (should not be greater than the start and end date of vision
                    // also changing the placeholder with the vision's start and end date.)
                    $( "#kpiStartDate" ).datepicker({
                        showSecond: true,
                        timeFormat: 'hh:mm:ss',
                        dateFormat: 'yy-mm-dd',
                        numberOfMonths: 1,
                        onSelect: function(selected) {
                            $("#kpiEndDate").datepicker("option","minDate", selected)
                        }
                    }).attr("placeholder","Strategy start date is "+ data.start_date);

                    $( "#kpiEndDate" ).datepicker({
                        showSecond: true,
                        timeFormat: 'hh:mm:ss',
                        dateFormat: 'yy-mm-dd',
                        numberOfMonths: 1,
                        onSelect: function(selected) {
                            $("#kpiStartDate").datepicker("option","maxDate", selected)
                        }
                    }).attr("placeholder","Strategy end date is " + data.end_date);
                }
            });
            return false;
        }
        else
        {
            return true;
        }
    }*/


    // Create Kpi Validation
    $("#strategyDropDown").blur(function () {
        validateSelectStrategy();
    });

    // calling the fetch strategy date  function on change event of select tag
    $("#strategyDropDown").change(function () {
        fetchStrategyDate();
        validateSelectStrategy();
    });

    // function to validate kpi name
    function validateKpiName() {
        var kpiName = $("#kpiName").val();
        if (kpiName == "" || (/^[0-9]*$/g.test(kpiName))) {
            $("#kpiName").css({
                "border": "1px solid red",
            });

            $(".kpiNameError").text("Please Enter A Valid Name");
            return true;
        }

        else {
            $("#kpiName").css({
                "border": "1px solid green",
            });
            $(".kpiNameError").text("");
            return false;
        }
    }

    // on blur
    $("#kpiName").blur(function () {
        validateKpiName();
    });
    //   on focus
    $("#kpiName").focus(function () {
        $("#kpiName").css({
            "border": "1px solid",
        });
    });

    // function to validate kpi description
    function validateKpiDescription() {
        var kpiDescription = $("#kpiDescription").val();
        if (kpiDescription == "") {
            $("#kpiDescription").css({
                "border": "1px solid red",
            });

            $(".kpiDescriptionError").text("Please Enter A Description");
            return true;
        }

        else {
            $("#kpiDescription").css({
                "border": "1px solid green",
            });
            $(".kpiDescriptionError").text("");
            return false;
        }
    }

    // on blur
    $("#kpiDescription").blur(function () {
        validateKpiDescription();
    });
    //   on focus
    $("#kpiDescription").focus(function () {
        $("#kpiDescription").css({
            "border": "1px solid",
        });
    });

    // function to validate kpi target
    function validateKpiTarget() {
        var kpiTarget = $("#kpiTarget").val();
        if (kpiTarget == "" || (!/^[0-9]*$/g.test(kpiTarget))) {
            $("#kpiTarget").css({
                "border": "1px solid red",
            });
            $(".kpiTargetError").text("Please Enter valid numbers");
            return true;
        }
        else {
            $("#kpiTarget").css({
                "border": "1px solid green",
            });
            $(".kpiTargetError").text("");
            return false;
        }
    }

    // on blur
    $("#kpiTarget").blur(function () {
        validateKpiTarget();
    });
    //   on focus
    $("#kpiTarget").focus(function () {
        $("#kpiTarget").css({
            "border": "1px solid",
        });
    });
    // function to validate kpiStartDate
    function validateKpiStartDate() {
        var kpiStartDate = $("#kpiStartDate").val();
        if (kpiStartDate == "")
        {
            $("#kpiStartDate").css({"border": "1px solid red",});
            $(".kpiStartDateError").text("Please Enter valid Start Date");
            return true;
        }
        else
        {
            $("#kpiStartDate").css({"border": "1px solid green",});
            $(".kpiStartDateError").text("");
            return false;
        }
    }
    //   on change
    $("#kpiStartDate").change(function () {
        $("#kpiStartDate").css({
            "border": "1px solid",
        });
        validateKpiStartDate();

    });
// function to validate kpi end date
    function validateKpiEndDate() {
        var kpiEndDate = $("#kpiEndDate").val();
        if (kpiEndDate == "")
        {
            $("#kpiEndDate").css({"border": "1px solid red",});
            $(".kpiEndDateError").text("Please Enter valid End Date");
            return true;
        }
        else
        {
            $("#kpiEndDate").css({"border": "1px solid green",});
            $(".kpiEndDateError").text("");
            return false;
        }
    }
    //   on change
    $("#kpiEndDate").change(function () {
        $("#kpiEndDate").css({
            "border": "1px solid",
        });
        validateKpiEndDate();
    });

    //strategy create process
    $("#kpiCreateForm").submit(function (e) {
        e.preventDefault();
        if (validateSelectStrategy() || validateKpiName() || validateKpiDescription() ||
            validateKpiTarget() ||validateKpiStartDate() || validateKpiEndDate())
        {
            swal("Error","Please fill the form correctly","error");
            validateSelectStrategy();
            validateKpiName();
            validateKpiDescription();
            validateKpiTarget();
            validateKpiStartDate();
            validateKpiEndDate()
        }
        else
        {
            var kpiName = $("#kpiName").val();
            var strategyID=$('#strategyDropDown :selected').val();
            $.ajax({
                url: "kpiExist/" + kpiName+ "/" + strategyID,
                type: "get",
                success: function (response) {
                    // 1 means that level name exist
                    if (response == 1)
                    {
                        $(".kpiNameError").html("This name has already been taken").css({
                            "color":"red",
                            "font-size":"12px"

                        });
                    }
                    else
                        {
                            var strategyID=$('#strategyDropDown :selected').val();
                            var loggedInUser =$("#logged-in-user").val();
                        var kpiTarget      =$("#kpiTarget").val();
                        var kpiDescription =$("#kpiDescription").val();
                        var kpiStartDate   =$("#kpiStartDate").val();
                        var kpiEndDate     =$("#kpiEndDate").val();
                        var kpiToken      =$('input[type="hidden"]').val();
                       // console.log(id);
//alert(ok);
                        //Ajax call
                        $.ajax({
                            url:'/kpi',
                            method:'post',
                            data:{
                                // user_id:1,
                                strategy_id: strategyID,
                                user_id: loggedInUser,
                                name:kpiName,
                                target:kpiTarget,
                                description:kpiDescription,
                                start_date:kpiStartDate,
                                end_date:kpiEndDate,
                                _token:kpiToken
                            },
                            success:function(response){

                                if (response.errors != null)
                                {
                                    swal("Error", "Please fill the form correctly", "error");
                                }
                                else
                                    {

                                    // $('.kpitable').append("<tr id='kpi" + response.id + "'>" +
                                    //     //"<td>" + response.id + "</td>" +
                                    //     "<td>" + response.name + "</td>" +
                                    //     "<td>" + response.description + "</td>" +
                                    //     "<td>" + response.target + "</td>" +
                                    //     "<td>" + response.start_date + "</td>" +
                                    //     "<td>" + response.end_date + "</td>" +
                                    //     // "<td>" + response.status + "</td>" +
                                    //     "<td>" +moment(response.end_date).from(response.start_date) + "</td>" +
                                    //     "<td><div class='ks-controls dropdown'>" +
                                    //     "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                                    //     "<span class='la la-ellipsis-h'></span></a>"+
                                    //     "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
                                    //     "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
                                    //     "<a class='dropdown-item editKpiLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#updateKpiModal'>" +
                                    //     "<span class='la la-pencil ks-icon'></span>Edit</a>" +
                                    //     "<a class='dropdown-item deleteKpiLink' href='#' data-id='"+response.id+"'>" +
                                    //     "<span class='la la-trash ks-icon'></span>Delete</a>" +
                                    //     // "<a class='dropdown-item assignKpiLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#assignKpiModal'>" +
                                    //     // "<span class='la la-users ks-icon'></span>Assign</a>" +
                                    //     "<a class='dropdown-item editKpiLink' href='kpi/"+response.id+"' data-id='"+response.id+"'>" +
                                    //     "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
                                    //     "</div>" +
                                    //     "</div></td>" +
                                    //     "</tr>"
                                    //);
                                        window.location.href = "kpi";
                                }
                            },
                        });
                        swal({
                            icon:"success",
                            text:"KPI created Successfully"
                        });
                        $("#kpiCreateForm")[0].reset();
                        $("#createKpiModal").modal('hide');
                    }

                }
            });
        }
    }); //End of create KPI

    /*
    =================================================================
    01 - Delete vision from db using ajax
    =================================================================
    */
    $(document).on("click", ".deleteKpiLink", function(){
        var id = $(this).attr("data-id");
        var token  = $('input[type="hidden"]').val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this! ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url:'/kpi/'+id,
                    method:"delete",
                    data:{_token:token},
                    success: function (data) {
                        swal("deleted!", "KPI is deleted successfully!", "success");
                        $("#kpi"+id).remove();
                    },
                    error:function (error) {
                        if (error.status == 405)
                        {
                            window.location.href="/denied";
                        }
                    }
                });
            }
        })
    });






    // Update KPI Validation

    // function to validate kpi name
    function updateValidateKpiName() {
        var kpiName = $("#updateKpiName").val();
        if (kpiName == "" || (/^[0-9]*$/g.test(kpiName))) {
            $("#updateKpiName").css({
                "border": "1px solid red",
            });

            $(".updateKpiNameError").text("Please Enter A Valid Name");
            return true;
        }

        else {
            $("#updateKpiName").css({
                "border": "1px solid green",
            });
            $(".updateKpiNameError").text("");
            return false;
        }
    }

    // on blur
    $("#updateKpiName").blur(function () {
        updateValidateKpiName();
    });
    //   on focus
    $("#updateKpiName").focus(function () {
        $("#updateKpiName").css({
            "border": "1px solid",
        });
    });

    // function to validate kpi description
    function updateValidateKpiDescription() {
        var kpiDescription = $("#updateKpiDescription").val();
        if (kpiDescription == "") {
            $("#updateKpiDescription").css({
                "border": "1px solid red",
            });

            $(".updateKpiDescriptionError").text("Please Enter A Description");
            return true;
        }

        else {
            $("#updateKpiDescription").css({
                "border": "1px solid green",
            });
            $(".updateKpiDescriptionError").text("");
            return false;
        }
    }

    // on blur
    $("#updateKpiDescription").blur(function () {
        updateValidateKpiDescription();
    });
    //   on focus
    $("#updateKpiDescription").focus(function () {
        $("#kpiDescription").css({
            "border": "1px solid",
        });
    });

    // function to validate kpi target
    function updateValidateKpiTarget() {
        var kpiTarget = $("#updateKpiTarget").val();
        if (kpiTarget == "" || (!/^[0-9]*$/g.test(kpiTarget))) {
            $("#updateKpiTarget").css({
                "border": "1px solid red",
            });
            $(".updateKpiTargetError").text("Please Enter valid numbers");
            return true;
        }
        else {
            $("#updateKpiTarget").css({
                "border": "1px solid green",
            });
            $(".updateKpiTargetError").text("");
            return false;
        }
    }

    // on blur
    $("#updateKpiTarget").blur(function () {
        updateValidateKpiTarget();
    });
    //   on focus
    $("#updateKpiTarget").focus(function () {
        $("#updateKpiTarget").css({
            "border": "1px solid",
        });
    });
    // function to validate kpiStartDate
    function updateValidateKpiStartDate() {
        var kpiStartDate = $("#updateKpiStartDate").val();
        if (kpiStartDate == "")
        {
            $("#updateKpiStartDate").css({"border": "1px solid red",});
            $(".updateKpiStartDateError").text("Please Enter valid Start Date");
            return true;
        }
        else
        {
            $("#updateKpiStartDate").css({"border": "1px solid green",});
            $(".updateKpiStartDateError").text("");
            return false;
        }
    }
    //   on change
    $("#updateKpiStartDate").change(function () {
        $("#updateKpiStartDate").css({
            "border": "1px solid",
        });
        updateValidateKpiStartDate();

    });
// function to validate kpi end date
    function updateValidateKpiEndDate() {
        var kpiEndDate = $("#updateKpiEndDate").val();
        if (kpiEndDate == "")
        {
            $("#updateKpiEndDate").css({"border": "1px solid red",});
            $(".updateKpiEndDateError").text("Please Enter valid End Date");
            return true;
        }
        else
        {
            $("#updateKpiEndDate").css({"border": "1px solid green",});
            $(".updateKpiEndDateError").text("");
            return false;
        }
    }
    //   on change
    $("#updateKpiEndDate").change(function () {
        $("#updateKpiEndDate").css({
            "border": "1px solid",
        });
        updateValidateKpiEndDate();
    });
    // End update KPI Validation


    /*
        =================================================================
        01 - updating KPI from db using ajax
        =================================================================
                */

    $(document).on('click','.editKpiLink', function(){
        var kpi_id            = $(this).closest("tr")["0"].children["0"].innerHTML;
        var kpi_name            = $(this).closest("tr")["0"].children["1"].innerHTML;
        var kpi_description     = $(this).closest("tr")["0"].children["2"].innerHTML;
        var kpi_target          = $(this).closest("tr")["0"].children["3"].innerHTML;
        var kpi_startdate       = $(this).closest("tr")["0"].children["4"].innerHTML;
        var kpi_endDate         = $(this).closest("tr")["0"].children["5"].innerHTML;
        var kpi_status          = $(this).closest("tr")["0"].children["6"].innerHTML;


        $("#updateKpiID").val(kpi_id);
        $("#updateKpiName").val(kpi_name);
        $("#updateKpiTarget").val(kpi_target);
        $("#updateKpiDescription").val(kpi_description);
        $("#updateKpiStartDate").val(kpi_startdate);
        $("#updateKpiEndDate").val(kpi_endDate);
        $("#updateKpiStatus").val(kpi_status);



    });

    //Ajax for updating data in database

    $("#kpiUpdateForm").submit(function(e) {

        e.preventDefault();

        var id          = $("#updateKpiID").val();
        var name        = $('#updateKpiName').val();
        var target      = $('#updateKpiTarget').val();
        var description = $('#updateKpiDescription').val();
        var startdate   = $('#updateKpiStartDate').val();
        var enddate     = $('#updateKpiEndDate').val();
        var token       = $('input[type="hidden"]').val();

        $.ajax({

            url: '/kpi/' + id,
            type: 'put',
            data: {
                id: id,
                name: name,
                description: description,
                target: target,
                start_date:startdate,
                end_date:enddate,
                _token:token
            },
            success:function(response){


                $('#kpi'+response.id).replaceWith("<tr id='kpi" + response.id + "'>" +
                    "<td>" + response.id + "</td>" +
                    "<td>" + response.name + "</td>" +
                    "<td>" + response.description + "</td>" +
                    "<td>" + response.target + "</td>" +
                    "<td>" + response.start_date .slice(0,10)+ "</td>" +
                    "<td>" + response.end_date .slice(0,10)+ "</td>" +
                    // "<td>" + response.status + "</td>" +
                    "<td>" +moment(response.end_date).from(response.start_date) + "</td>" +
                    "<td><div class='ks-controls dropdown'>" +
                    "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                    "<span class='la la-ellipsis-h'></span></a>"+
                    "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
                    "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
                    "<a class='dropdown-item editKpiLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#updateKpiModal'>" +
                    "<span class='la la-pencil ks-icon'></span>Edit</a>" +
                    "<a class='dropdown-item deleteKpiLink' href='#' data-id='"+response.id+"'>" +
                    "<span class='la la-trash ks-icon'></span>Delete</a>" +
                    // "<a class='dropdown-item assignKpiLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#assignKpiModal'>" +
                    // "<span class='la la-users ks-icon'></span>Assign</a>" +
                    "<a class='dropdown-item editKpiLink' href='kpi-detail/"+response.id+"' data-id='"+response.id+"'>" +
                    "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
                    "</div>" +
                    "</div></td>" +
                    "</tr>"
                );
                swal({
                    icon:"success",
                    text:"KPI Updated Successfully"
                });
                $("#kpiUpdateForm")[0].reset();
                $("#updateKpiModal").modal('hide');
            },
            error:function (error) {
                if (error.status == 405)
                {
                    window.location.href="/denied";
                }
            }

        });
    });




















    //for displaying user data in edit modal (Zeeshan)

    $(document).on('click', '.userEditButton', function () {
        var id = $(this).closest("tr")["0"].children["0"].innerHTML;
        var user_name = $(this).closest("tr")["0"].children["1"].innerHTML;
        var last_name = $(this).closest("tr")["0"].children["2"].innerHTML;
        var user_email = $(this).closest("tr")["0"].children["3"].innerHTML;
        var user_designation = $(this).closest("tr")["0"].children["4"].innerHTML;
        var user_level = $(this).closest("tr")["0"].children["5"].innerHTML;
        // var level_id = $(this).closest("tr").find("input").val();
        var country = $(this).closest("tr")["0"].children["6"].innerHTML;
        var province = $(this).closest("tr")["0"].children["7"].innerHTML;
        var city = $(this).closest("tr")["0"].children["8"].innerHTML;
        var user_address = $(this).closest("tr")["0"].children["9"].innerHTML;
        var user_contact = $(this).closest("tr")["0"].children["10"].innerHTML;
        // console.log(level_id);

        $("#User-id").val(id);
        $("#User-name").val(user_name);
        $("#Last-name").val(last_name);
        $("#User-email").val(user_email);
        $("#User-designation").val(user_designation);
        // $('#User-level').val(user_level);
        $("#UserlevelDropDown-edit option:selected").text(user_level);
        $("#CountySel option:selected").text(country);
        $("#StateSel option:selected").text(province);
        $("#CitySel option:selected").text(city);
        $("#User-address").val(user_address);
        $("#User-contact").val(user_contact);

        //console.log(r);

        //Ajax for updating data in database


    });

    $("#EditUserForm").submit(function (e) {


        e.preventDefault();
        var id = $('#User-id').val();
        var name = $('#User-name').val();
        var lastname = $("#Last-name").val();
        var email = $('#User-email').val();
        var designation = $('#User-designation').val();
        var user_level = $('#UserlevelDropDown-edit :selected').val();
        var levelName=$('#UserlevelDropDown-edit :selected').text();
        var country = $('#CountySel option:selected').text();
        var province = $("#StateSel option:selected").text();
        var city =  $("#CitySel option:selected").text();
        var address = $('#User-address').val();
        var contact = $('#User-contact').val();
        var token = $('input[type="hidden"]').val();


        $.ajax({

            url: '/user/'+id,
            type: 'put',
            data: {
                id: id,
                name: name,
                last_name:lastname,
                email: email,
                user_designation: designation,
                user_level: user_level,
                user_levelname:levelName,
                country:country,
                province:province,
                city:city,
                address: address,
                contact: contact,
                _token: token
            },
            success: function (response) {
                $("#user" + response.id).replaceWith("<tr id='user" + response.id + "'>" +
                    "<td>" + response.id + "</td>" +
                    "<td>" + response.name + "</td>" +
                    "<td>" + response.last_name + "</td>" +
                    "<td>" + response.email + "</td>" +
                    "<td>" + response.designation + "</td>" +
                    "<td>" + levelName + "</td>" +
                    "<td>" + response.country + "</td>" +
                    "<td>" + response.province + "</td>" +
                    "<td>" + response.city + "</td>" +
                    "<td>" + response.address + "</td>" +
                    "<td>" + response.contact + "</td>" +
                    "<td><button class='btn btn-outline-primary ks-no-text ks-solid userEditButton' id='editButton' data-toggle='modal' data-target='#EditUserModal' title='Edit' data-id='" + response.id + "' id='packageUpdateButton'> " + "<span class=\"la la-edit ks-icon\"></span>" + "</button>" +"&nbsp;"+
                    "<button class='btn btn-outline-danger ks-no-text ks-solid deleteuserButton' title='Delete' data-id='" + response.id + "'> " + "<span class=\"la la-trash ks-icon\"></span>" + "</button></td>" +
                    "</tr>"
                );

                swal({
                    icon: "success",
                    text: "updated successfully!"
                });
                $("#EditUserForm")[0].reset();
                $("#EditUserModal").modal("hide");
            },
            error:function (error) {
                if (error.status == 405)
                {
                    window.location.href="/denied";
                }
            }

        });
        // }
    });





    /*
    =================================================================
    01 - To Check User Name
    =================================================================
    */
    $("#User-name").blur(function () {
        ValidateUserName();
    })
    $("#User-name").focus(function () {
        $("#User-name").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function ValidateUserName()
    {
        var userName = $("#User-name").val();
        if(userName == "") {
            $("#User-name").css({
                "border":"1px solid red",
            });
            $("#User-name-has-error").html("Invalid user name").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        }
        if(!/^[a-zA-Z ]*$/g.test(userName)) {
            $("#User-name").css({
                "border": "1px solid red"

            });

            $("#User-name-has-error").html("User name must be in Alphabets").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#User-name").css({
                "border":"1px solid #D0D0D0",
            });
            $("#User-name-has-error").empty();
        }
        return false;
    }
    /*
            =================================================================
            02 - To Check Company Email
            =================================================================
            */
    $("#User-email").blur(function () {
        ValidateUserEmail();
    })
    $("#User-email").focus(function () {
        $("#User-email").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function ValidateUserEmail()
    {
        var userEmail = $("#User-email").val();
        if(userEmail == "") {
            $("#User-email").css({
                "border":"1px solid red",
            });
            $("#User-email-has-error").html("Invalid user email").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        } else {
            if(isValidEmailAddress(userEmail))
            {
                $("#User-email").css({
                    "border":"1px solid green",
                });
                $("#User-email-has-error").empty();
            }else {
                $("#User-email-has-error").html("Please Enter Valid Email").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
            }
        }
        return false;
    }
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }

    /*
           =================================================================
           09 - To Check User Designation
           =================================================================
           */
    $("#User-designation").blur(function () {
        ValidateUserDesignation();
    })
    $("#User-designation").focus(function () {
        $("#User-designation").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function ValidateUserDesignation()
    {
        var userDesignation = $("#User-designation").val();
        if(userDesignation == "") {
            $("#User-designation").css({
                "border":"1px solid red",
            });
            $("#User-designation-has-error").html("Invalid user designation").css({
                "color":"red",
                "font-size":"13px",
                "border-radius": "4px",
            });
            return true;
        }
        if(!/^[a-zA-Z ]*$/g.test(userDesignation)) {
            $("#User-designation").css({
                "border": "1px solid red"

            });

            $("#User-designation-has-error").html("Invalid designation").css({
                "font-size": "14px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#User-designation").css({
                "border":"1px solid #D0D0D0",
            });
            $("#User-designation-has-error").empty();
        }
        return false;
    }

    /*
            =================================================================
            05 - To Check User Address
            =================================================================
            */
    $("#User-address").blur(function () {
        ValidateUserAddress();
    })
    $("#User-address").focus(function () {
        $("#User-address").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function ValidateUserAddress()
    {
        var userAddress = $("#User-address").val();
        if(userAddress == "") {
            $("#User-address").css({
                "border":"1px solid red",
            });
            $("#User-address-has-error").html("Invalid user address").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        } else {
            $("#User-address").css({
                "border":"1px solid #D0D0D0",
            });
            $("#User-address-has-error").empty();
        }
        return false;
    }

    /*
            =================================================================
            06 - To Check User contact
            =================================================================
            */
    $("#User-contact").blur(function () {
        validateUserContact();
    })
    $("#User-contact").focus(function () {
        $("#User-contact").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function validateUserContact()
    {
        var userContact = $("#User-contact").val();
        if(userContact == "") {
            $("#User-contact").css({
                "border":"1px solid red",
            });
            $("#User-contact-has-error").html("Invalid user contact").css({
                "color":"red",
                "font-size":"13px",
                "border-radius": "4px",
            });
            return true;
        }
        // if( isNaN(parseInt(userContact, 15)) ) {
        //     $("#User-contact").css({
        //         "border":"1px solid red"
        //     });
        //     $("#User-contact-has-error").html("Invalid: e.g 0900112222").css({
        //         "color":"red",
        //         "font-size":"12px"
        //     });
        //     return true;
        // }
        // else {
        //     $("#User-contact").css({
        //         "border":"1px solid green",
        //     });
        //     $("#User-contact-has-error").empty();
        // }
        return false;
    }
    var telInput = $("#User-contact"),
        errorMsg = $("#Error-msg");
        // validMsg = $("#valid-msg");

// initialise plugin
    telInput.intlTelInput({
        utilsScript: "../../build/js/utils.js"
    });

    var reset = function() {
        telInput.removeClass("error");
        errorMsg.addClass("hide");
        validMsg.addClass("hide");
    };

// on blur: validate
    telInput.blur(function() {
        reset();
        if ($.trim(telInput.val())) {
            if (telInput.intlTelInput("isValidNumber")) {
                validMsg.removeClass("hide");
                $("#User-contact-has-error").empty();
                $("#User-contact").css({
                    "border":"1px solid green"
                });

            } else {
                $("#User-contact-has-error").empty();
                telInput.addClass("error");
                $("#User-contact").css({
                    "border":"1px solid red"
                });
                errorMsg.removeClass("hide");
            }
        }
    });


    /*
    =================================================================
    11 - To Check Submit
    =================================================================
    */




            /*
            =================================================================
            11 - To Check Submit
            =================================================================
            */

    /*Zeeshan Work Ended*/



































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































    /*
    =================================================================
            Tahira Work
    =================================================================
    */


    /*
    =================================================================
    01 - To Check package Name
    =================================================================
     */

    $("#package-name").blur(function () {
        isAlphabaticPackageName();
    });

    function isAlphabaticPackageName() {
        var packageName = $("#package-name").val();

        if (packageName == "") {
            $("#package-name").css({
                "border": "1px solid red"

            });

            $("#package-name-has-error").html("Please enter package name").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        if(!/^[a-zA-Z]*$/g.test(packageName)) {
            $("#package-name").css({
                "border": "1px solid red"

            });

            $("#package-name-has-error").html("Package name must be in Alphabets").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#package-name").css("border", "1px solid #E0E0E0");
            $("#package-name-has-error").empty();

        }
        return false;
    }

    $("#package-name").focus(function () {
        $("#package-name").css("border", "1px solid #E0E0E0");
    });


    /*
    =================================================================
    01 - To Check package Charges
    =================================================================
    //  */
    // $("#package-amount").maskMoney({
    //     thousands:'', decimal:'', allowZero:false, suffix: ' $', precision:0
    // });

    $("#package-amount").blur(function () {
        isValidPackagecharges();
    });
    function isValidPackagecharges()
    {
        var packageAmount = $("#package-amount").val();
        if(packageAmount == "") {
            $(".input-euro").css({
                "border":"1px solid red"
            });
            $("#package-amount-has-error").html("Please Enter Package charges").css({
                "color":"red",
                "font-size":"12px"
            });
            return true;
        }
        if(!/^[0-9]*$/g.test(packageAmount) ) {
            $(".input-euro").css({
                "border":"1px solid red"
            });
            $("#package-amount-has-error").html("Please Enter valid Package charges in number").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        }
        else {
            $(".input-euro").css("border","1px solid #E0E0E0");
            $("#package-amount-has-error").empty();
        }
        return false;
    }

    $("#package-amount").focus(function () {
        $(".input-euro").css("border", "1px solid #E0E0E0");
    });

    /*
=================================================================
01 - To Check maximum users
=================================================================
 */
    $("#users").blur(function () {
        isValidUsers();
    });
    function isValidUsers()
    {
        var users = $("#users").val();
        if(users == "") {
            $("#users").css({
                "border":"1px solid red"
            });
            $("#package-users-has-error").html("Please Enter maximum users").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        } else {
            $("#users").css("border","1px solid #E0E0E0");
            $("#package-users-has-error").empty();
        }
        return false;
    }

    $("#users").focus(function () {
        $("#users").css("border", "1px solid #E0E0E0");
    });



    /*
   =================================================================
   01 - validation before submitting the form
   =================================================================
    */
    $("#create").submit(function (e) {
        e.preventDefault();
        if (isAlphabaticPackageName() || isValidPackagecharges() || isValidUsers()) {
            // e.preventDefault();
            swal("Error", "Please fill the form correctly", "error");
            isAlphabaticPackageName();
            isValidPackagecharges();
            isValidUsers();
        }
        else {
            //  checking if the package Nam already exist or not
            var packagename = $("#package-name").val();
            $.ajax({
                url: "" + packagename,
                type: "get",
                success: function (responseData) {
                    // 1 means that level name exist
                    if (responseData == 1) {
                        $("#package-name-has-error").html("This name has already been taken").css({
                            "color":"red",
                            "font-size":"12px"

                        });
                    }
                    else {
                        var id = $('#package-id').val();
                        var name = $('#package-name').val();
                        var amount = $('#package-amount').val();
                        var users = $('#users').val();
                        var token = $('input[type="hidden"]').val();


                        $.ajax({

                            url: '/package',
                            method: 'post',
                            data: {
                                id              :id,
                                package_name    : name,
                                package_amount  : amount,
                                users   : users,
                                _token: token
                            },
                            success: function (response) {

                                    $('#packageTable').prepend("<tr id='package" + response.id + "'>" +
                                        // "<td>" + response.id + "</td>" +
                                        "<td>" + response.package_name + "</td>" +
                                        "<td>" + response.package_amount+ " $" + "</td>" +
                                        "<td>" + response.users + "</td>" +
                                        "<td><button class='btn btn-outline-danger ks-no-text ks-solid deleteButton' title='Delete' data-id='" + response.id + "' data-name='" + response.package_name + "'> " + "<span class=\"la la-trash ks-icon\"></span>" + "</button></td>" +
                                        "</tr>"
                                    );
                                    swal({
                                        icon: "success",
                                        text: "Saved successfully!"
                                    });
                                    $("#create")[0].reset();
                                    $("#CreateModal").modal("hide");

                            }

                        });
                    }
                }

            });
        }
    });
    /*
   =================================================================
   01 - close button for create package modal
   =================================================================
    */
    $(".closemodal").click(function () {
        $("#package-name").css("border","1px solid #E0E0E0");
        $("#package-name-has-error").empty();
        $("#package-amount").css("border","1px solid #E0E0E0");
        $("#package-amount-has-error").empty();
        $("#users").css("border","1px solid #E0E0E0");
        $("#package-users-has-error").empty();
        $("#create")[0].reset();
    });
    /*
   =================================================================
   01 - deletion of record
   =================================================================
    */
    $(document).on("click",".deleteButton",function () {
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var token  = $('input[type="hidden"]').val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this! ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url:'/package/' +id,
                    method:"delete",
                    data:{_token:token,
                            package_name:name
                    },
                    success: function (data) {
                        swal("deleted!", "This package is deleted successfully!", "success");
                        $("#package"+id).remove();
                    }
                });
            }
        })
    });




    /*
 =================================================================
 01 - Insert User data in db
 =================================================================
 */
    $("#create-user").submit(function(e){
        e.preventDefault();
        if (isValidUserName() || isValidUserEmail() || validateSelectLevel()|| isValidUserDesignation() || isValidUserAddress() || isValidUserContact()|| isValidlastName() ||  isValidcountryName() || isValidprovinceName() ||isValidcityName()  ||isValidpassword())
        {
            swal("Error", "Please fill the form correctly", "error");
            isValidUserName();
            isValidlastName();
            isValidUserEmail();
            isValidpassword();
            isValidUserDesignation();
            isValidUserAddress();
            isValidUserContact();
            isValidcountryName();
            validateSelectLevel();
            isValidcityName();
            isValidprovinceName();

            isValidlastName();


        }
    else
        {
            //  checking if the package Nam already exist or not
            var Email = $("#user-email").val();
            $.ajax({
                url: "user/" + Email,
                type: "get",
                success: function (responseData) {
                    // 1 means that level name exist
                    if (responseData == 1) {
                        $("#user-email-has-error").html("This Email has already been taken").css({
                            "color": "red",
                            "font-size": "12px"

                        });
                    }
                    else{
                    var id= $("#user-id").val();
                    var name= $("#user-name").val();
                    var lastname= $("#last-name").val();
                    var email= $("#user-email").val();
                    var password= $("#user-password").val();
                    var designation= $("#user-designation").val();
                    var levelid= $("#levelDropDown").val();
                    var levelName=$('#levelDropDown :selected').text();
                    var country= $("#countySel :selected").val();
                    var province= $("#stateSel :selected").val();
                    var city= $("#citySel :selected").val();
                    var address= $("#user-address").val();
                    var contact= $("#user-contact").val();
                    var token = $('input[type="hidden"]').val();


                        $.ajax({
                            url:'/user',
                            method:'post',
                            data:{
                                name:name,
                                last_name:lastname,
                                email:email,
                                password:password,
                                designation:designation,
                                level_id:levelid,
                                country:country,
                                province:province,
                                city:city,
                                address:address,
                                contact:contact,
                                _token:token

                            },
                            success:function(response){
                                if(response == 1)
                                {
                                    $("#create-user")[0].reset();
                                    $("#CreateUser").modal("hide");
                                    swal("Limit Reached!", "Can't create more users !", "error");

                                }
                                else
                                {
                                    $('#userTable').append("<tr id='user" + response.id + "'>" +
                                        "<td>" + response.id + "</td>" +
                                        "<td>" + response.name + "</td>" +
                                        "<td>" + response.last_name + "</td>" +
                                        "<td>" + response.email + "</td>" +
                                        "<td>" + response.designation + "</td>" +
                                        "<td>" + levelName + "</td>" +
                                        "<td>" + response.country + "</td>" +
                                        "<td>" + response.province + "</td>" +
                                        "<td>" + response.city + "</td>" +
                                        "<td>" + response.address + "</td>" +
                                        "<td>" + response.contact + "</td>" +
                                        "<td><button class='btn btn-outline-primary ks-no-text ks-solid userEditButton' data-toggle='modal' data-target='#EditUserModal' title='Edit' data-id='" + response.id + "'> " + "<span class=\"la la-edit ks-icon\"></span>" + "</button>" + "&nbsp;" +
                                        "<button class='btn btn-outline-danger ks-no-text ks-solid deleteuserButton' title='Delete' data-id='" + response.id + "'> " + "<span class=\"la la-trash ks-icon\"></span>" + "</button></td>" +
                                        "</tr>"
                                    );
                                    swal({
                                        icon: "success",
                                        text: "Saved successfully!"
                                    });
                                    $("#create-user")[0].reset();
                                    $("#CreateUser").modal("hide");
                                }

                            },
                            error:function (error) {
                                if (error.status == 405)
                                {
                                    window.location.href="/denied";
                                }
                            }
                        });
                    }
                }
            });
        }
        });


    /*
 =================================================================
 01 - Delete User data from db using ajax
 =================================================================
 */
  $(document).on("click", ".deleteuserButton", function(){
      var id = $(this).attr("data-id");
      var token  = $('input[type="hidden"]').val();
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this! ",
          icon: "warning",
          buttons: true,
          dangerMode: true
      }).then((willDelete) => {
          if(willDelete) {
              $.ajax({
                  url:'/user/'+id,
                  method:"delete",
                  data:{_token:token},
                  success: function (data) {
                      swal("deleted!", "This User is deleted successfully!", "success");
                      $("#user"+id).remove();
                  },
                  error:function (error) {
                      if (error.status == 405)
                      {
                          window.location.href="/denied";
                      }
                  }
              });
          }
      })
  });
    /*
   =================================================================
   01 - validation on individual fields of create vision view
   =================================================================
    */

    $("#visionName").blur(function () {
        isAlphabaticVisionName();
    });

    function isAlphabaticVisionName() {
        var name = $("#visionName").val();

        if (name == "") {
            $("#visionName").css({
                "border": "1px solid red"

            });

            $(".visionNameError").html("Please enter vision name").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        if(!/^[a-zA-Z ]*$/g.test(name)) {
            $("#visionName").css({
                "border": "1px solid red"

            });

            $(".visionNameError").html("Vision name must be in Alphabets").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#visionName").css("border", "1px solid #E0E0E0");
            $(".visionNameError").empty();

        }
        return false;
    }
    $("#visionName").focus(function () {
        $("#visionName").css("border", "1px solid #E0E0E0");
    });
    /*
      =================================================================
      01 - To Check vision target
      =================================================================
       */
    $("#visionTarget").blur(function () {
        isValidvisionTarget();
    });
    function isValidvisionTarget()
    {
        var target = $("#visionTarget").val();
        if(target == "") {
            $("#visionTarget").css({
                "border":"1px solid red"
            });
            $(".visionTargetError").html("Please Enter vision's target").css({
                "color":"red",
                "font-size":"12px"
            });
            return true;
        }
        if(!/^[0-9]*$/g.test(target)) {
            $("#visionTarget").css({
                "border":"1px solid red"
            });
            $(".visionTargetError").html("Please Enter valid target in number").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        }
        else {
            $("#visionTarget").css("border","1px solid #E0E0E0");
            $(".visionTargetError").empty();
        }
        return false;
    }

    $("#visionTarget").focus(function () {
        $("#visionTarget").css("border", "1px solid #E0E0E0");
    });

    /*
=================================================================
01 - To Check validation on description
=================================================================
*/
    $("#visionDescription").blur(function () {
        isValiddescription();
    });
    function isValiddescription()
    {
        var description = $("#visionDescription").val();
        if(description == "") {
            $("#visionDescription").css({
                "border":"1px solid red"
            });
            $(".visionDescriptionError").html("Please Enter brief description").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        } else {
            $("#visionDescription").css("border","1px solid #E0E0E0");
            $(".visionDescriptionError").empty();
        }
        return false;
    }
    $("#visionDescription").focus(function () {
        $("#visionDescription").css("border", "1px solid #E0E0E0");
    });

    /*
=================================================================
01 - To Check validation on dates
=================================================================
*/
    function isValidDate()
    {
        var startdate = $("#visionStartDate").val();
        if(startdate == "") {
            $("#visionStartDate").css({
                "border":"1px solid red"
            });
            $(".visionStartDateError").html("Please Enter start date").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        } else {
            $("#visionStartDate").css("border","1px solid #E0E0E0");
            $(".visionStartDateError").empty();
        }
        return false;
    }
    $("#visionStartDate").focusin(function () {
        $("#visionStartDate").css("border", "1px solid #E0E0E0");
        $(".visionStartDateError").empty();
    });



    /*
=================================================================
01 - To Check validation on dates
=================================================================
*/
    // $("#visionEndDate").blur(function () {
    //     isValidEndDate();
    // });
    function isValidEndDate()
    {
        var enddate = $("#visionEndDate").val();
        if(enddate == "") {
            $("#visionEndDate").css({
                "border":"1px solid red"
            });
            $(".visionEndDateError").html("Please Enter end date").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        } else {
            $("#visionEndDate").css("border","1px solid #E0E0E0");
            $(".visionEndDateError").empty();
        }
        return false;
    }
    $("#visionEndDate").focusin(function () {
        $("#visionEndDate").css("border", "1px solid #E0E0E0");
        $(".visionEndDateError").empty();
    });
    // $("#visionEndDate").change(function () {
    //     $("#visionEndDate").css({
    //         "border": "1px solid",
    //     });
    //     isValidEndDate();
    //
    // });
    /*
 =================================================================
 01 - close button for edit package modal
 =================================================================
           */
    $("#crossvisionmodal").click(function () {
        $("#visionName").css("border","1px solid #E0E0E0");
        $(".visionNameError").empty();
        $("#visionTarget").css("border","1px solid #E0E0E0");
        $(".visionTargetError").empty();
        $("#visionDescription").css("border","1px solid #E0E0E0");
        $(".visionDescriptionError").empty();
        $(".visionCreateForm")[0].reset();
    });



    /*
=================================================================
01 - vision creation
=================================================================
     */

$(".visionCreateForm").submit(function (e) {
   e.preventDefault();
    $('.dataTables_empty').remove();
    if (isAlphabaticVisionName() || isValidvisionTarget() ||  isValiddescription() || isValidDate()||isValidEndDate() ) {
        // e.preventDefault();
        swal("Error", "Please fill the form correctly", "error");
        isAlphabaticVisionName();
        isValidvisionTarget();
        isValiddescription();
        isValidDate();
        isValidEndDate();
    }
    else
    {
        var companyid = $("#company-id").val();
        var name = $("#visionName").val();
        $.ajax({
            url: "visionExist/" + name + "/" + companyid,
            type: "get",
            success: function (responseData) {
                console.log(responseData);
                // 1 means that level name exist
                if (responseData == 1) {
                    $(".visionNameError").html("This name has already been taken").css({
                        "color":"red",
                        "font-size":"12px"

                    });
                }
                else{
                    var companyId    =$("#company-id").val();
                    var name        =$("#visionName").val();
                    var target      =$("#visionTarget").val();
                    var description =$("#visionDescription").val();
                    var startdate   =$("#visionStartDate").val();
                    var enddate     =$("#visionEndDate").val();
                    var token      =$('input[type="hidden"]').val();
//alert(ok);
                    //Ajax call
                    $.ajax({
                        url:'/vision',
                        method:'post',
                        data:{
                            // user_id:1,
                            name:name,
                            target:target,
                            description:description,
                            start_date:startdate,
                            end_date:enddate,
                            company_id:companyId,
                            _token:token
                        },
                        success:function(response){
                            $('.visiontable').append("<tr id='vision" + response.id + "'>" +
                                "<td>" + response.id + "</td>" +
                                "<td>" + response.name + "</td>" +
                                "<td>" + response.description + "</td>" +
                                "<td>" + response.target + "</td>" +
                                "<td>" + (response.start_date).slice(0,10) + "</td>" +
                                "<td>" + (response.end_date).slice(0,10) + "</td>" +
                                // "<td>" + "Un Assigned" + "</td>" +
                                "<td>" + moment(response.end_date).from(response.start_date) + "</td>" +
                                // "<td><button class='btn btn-outline-primary ks-no-text ks-solid editVisionButton' data-toggle='modal' data-target='#updateVisionModal' title='Edit' data-id='" + response.id + "' id='visionUpdateButton'> " + "<span class=\"la la-edit ks-icon\"></span>" + "</button>" + "&nbsp;" +
                                // "<button class='btn btn-outline-danger ks-no-text ks-solid deletevisionButton' title='Delete' data-id='" + response.id + "'> " + "<span class=\"la la-trash ks-icon\"></span>" + "</button></td>" +
                                "<td><div class='ks-controls dropdown'>" +
                                "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                                "<span class='la la-ellipsis-h'></span></a>"+
                                "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
                                "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
                                "<a class='dropdown-item editVisionButton' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#updateVisionModal'>" +
                                "<span class='la la-pencil ks-icon'></span>Edit</a>" +
                                "<a class='dropdown-item deletevisionButton' href='#' data-id='"+response.id+"'>" +
                                "<span class='la la-trash ks-icon'></span>Delete</a>" +
                                // "<a class='dropdown-item assignVisionLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target=''>" +
                                // "<span class='la la-users ks-icon'></span>Assign</a>" +
                                "<a class='dropdown-item editVisionButton' href='vision-detail/"+response.id+"' data-id='"+response.id+"'>" +
                                "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
                                "</div>" +
                                "</div></td>" +
                                 "</tr>"
                            );
                            swal({
                                icon:"success",
                                text:"vision created Successfully"
                            });
                        },
                        error:function (error) {
                            if (error.status == 405)
                            {
                                window.location.href="/denied";
                            }
                        }
                    });
                    $(".visionCreateForm")[0].reset();
                    $("#createVisionModal").modal('hide');
                }

                }
            });
    }



});

    /*
    =================================================================
    01 - Delete vision from db using ajax
    =================================================================
    */
    $(document).on("click", ".deletevisionButton", function(){
        var id = $(this).attr("data-id");
        var token  = $('input[type="hidden"]').val();
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this! ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url:'/vision/'+id,
                    method:"delete",
                    data:{_token:token},
                    success: function (data) {
                        swal("deleted!", "vision is deleted successfully!", "success");
                        $("#vision"+id).remove();
                    },
                    error:function (error) {
                        if (error.status == 405)
                        {
                            window.location.href="/denied";
                        }
                    }
                });
            }
        })
    });

    /*
 =================================================================
 01 - validation on individual fields of Edit vision view
 =================================================================
  */

    $("#updatevisionName").blur(function () {
        isValidVisionName();
    });

    function isValidVisionName() {
        var name = $("#updatevisionName").val();

        if (name == "") {
            $("#updatevisionName").css({
                "border": "1px solid red"

            });

            $(".updateVisionNameError").html("Please enter vision name").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        if(!/^[a-zA-Z ]*$/g.test(name)) {
            $("#updatevisionName").css({
                "border": "1px solid red"

            });

            $(".updateVisionNameError").html("Vision name must be in Alphabets").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#updatevisionName").css("border", "1px solid #E0E0E0");
            $(".updateVisionNameError").empty();

        }
        return false;
    }
    $("#updatevisionName").focus(function () {
        $("#updatevisionName").css("border", "1px solid #E0E0E0");
    });
    /*
      =================================================================
      01 - To Check edit vision target
      =================================================================
       */
    $("#updateVisionTarget").blur(function () {
        isUpdatevisionTarget();
    });
    function isUpdatevisionTarget()
    {
        var target = $("#updateVisionTarget").val();
        if(target == "") {
            $("#updateVisionTarget").css({
                "border":"1px solid red"
            });
            $(".updateVisionTargetError").html("Please Enter Package charges").css({
                "color":"red",
                "font-size":"12px"
            });
            return true;
        }
        if(!/^[0-9]*$/g.test(target)) {
            $("#updateVisionTarget").css({
                "border":"1px solid red"
            });
            $(".updateVisionTargetError").html("Please Enter valid target in number").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        }
        else {
            $("#updateVisionTarget").css("border","1px solid #E0E0E0");
            $(".updateVisionTargetError").empty();
        }
        return false;
    }
    $("#updateVisionTarget").focus(function () {
        $("#updateVisionTarget").css("border", "1px solid #E0E0E0");
    });
    /*
=================================================================
01 - To Check validation on edit description
=================================================================
*/
    $("#updateVisionDescription").blur(function () {
        isUpdatedescription();
    });
    function isUpdatedescription()
    {
        var description = $("#updateVisionDescription").val();
        if(description == "") {
            $("#updateVisionDescription").css({
                "border":"1px solid red"
            });
            $(".updateVisionDescriptionError").html("Please Enter brief description").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        } else {
            $("#updateVisionDescription").css("border","1px solid #E0E0E0");
            $(".updateVisionDescriptionError").empty();
        }
        return false;
    }
    $("#updateVisionDescription").focus(function () {
        $("#updateVisionDescription").css("border", "1px solid #E0E0E0");
    });

    /*
=================================================================
01 - To Check validation on  edit dates
=================================================================
*/
    $("#updateVisionStartDate").blur(function () {
        isUpdateStartDate();
    });
    function isUpdateStartDate()
    {
        var startdate = $("#updateVisionStartDate").val();
        if(startdate == "") {
            $("#updateVisionStartDate").css({
                "border":"1px solid red"
            });
            $(".updateVisionStartDateError").html("Please Enter start date").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        } else {
            $("#updateVisionStartDate").css("border","1px solid #E0E0E0");
            $(".updateVisionStartDateError").empty();
        }
        return false;
    }
    $("#updateVisionStartDate").focus(function () {
        $("#updateVisionStartDate").css("border", "1px solid #E0E0E0");
    });

    /*
=================================================================
01 - To Check validation on dates
=================================================================
*/
    $("#updateVisionEndDate").blur(function () {
        isUpdateEndDate();
    });
    function isUpdateEndDate()
    {
        var enddate = $("#updateVisionEndDate").val();
        if(enddate == "") {
            $("#updateVisionEndDate").css({
                "border":"1px solid red"
            });
            $(".updateVisionEndDateError").html("Please Enter end date").css({
                "color":"red",
                "font-size":"12px"

            });
            return true;
        } else {
            $("#updateVisionEndDate").css("border","1px solid #E0E0E0");
            $(".updateVisionEndDateError").empty();
        }
        return false;
    }
    $("#updateVisionEndDate").focus(function () {
        $("#updateVisionEndDate").css("border", "1px solid #E0E0E0");
    });
    /*
    =================================================================
    01 - updating vision from db using ajax
    =================================================================
            */


    $(document).on('click','.editVisionButton', function(){
        var id                  = $(this).closest("tr")["0"].children["0"].innerHTML;
        var vision_name         = $(this).closest("tr")["0"].children["1"].innerHTML;
        var vision_description  = $(this).closest("tr")["0"].children["2"].innerHTML;
        var vision_target       = $(this).closest("tr")["0"].children["3"].innerHTML;
        var vision_startdate    = $(this).closest("tr")["0"].children["4"].innerHTML;
        var vision_enddate      = $(this).closest("tr")["0"].children["5"].innerHTML;

        $("#updatevisionId").val(id);
        $("#updatevisionName").val(vision_name);
        $("#updateVisionTarget").val(vision_target);
        $("#updateVisionDescription").val(vision_description);
        $("#updateVisionStartDate").val(vision_startdate);
        $("#updateVisionEndDate").val(vision_enddate);

    });

    //Ajax for updating data in database

    $("#visionUpdateForm").submit(function(e) {
        e.preventDefault();
        if (isValidVisionName() || isUpdatevisionTarget() ||  isUpdatedescription() || isUpdateStartDate()||isUpdateEndDate() ) {
            // e.preventDefault();
            swal("Error", "Please fill the form correctly", "error");
            isAlphabaticVisionName();
            isValidvisionTarget();
            isValiddescription();
            isValidDate();
            isValidEndDate();
        }
        else {
            var id = $('#updatevisionId').val();
            var name = $('#updatevisionName').val();
            var target = $('#updateVisionTarget').val();
            var description = $('#updateVisionDescription').val();
            var startdate = $('#updateVisionStartDate').val();
            var enddate = $('#updateVisionEndDate').val();
            var token = $('input[type="hidden"]').val();


            $.ajax({

                url: '/vision/' + id,
                type: 'put',
                data: {
                    id: id,
                    name: name,
                    description: description,
                    target: target,
                    start_date: startdate,
                    end_date: enddate,
                    _token: token

                },
                success: function (response) {
                    $("#vision" + response.id).replaceWith("<tr id='vision" + response.id + "'>" +
                        "<td>" + response.id + "</td>" +
                        "<td>" + response.name + "</td>" +
                        "<td>" + response.description + "</td>" +
                        "<td>" + response.target + "</td>" +
                        "<td>" + (response.start_date).slice(0, 10) + "</td>" +
                        "<td>" + (response.end_date).slice(0, 10) + "</td>" +
                        // "<td>" + "Un Assigned" + "</td>" +
                        "<td>" + moment(response.end_date).from(response.start_date) + "</td>" +
                        // "<td><button class='btn btn-outline-primary ks-no-text ks-solid editVisionButton' data-toggle='modal' data-target='#updateVisionModal' title='Edit' data-id='" + response.id + "' id='visionUpdateButton'> " + "<span class=\"la la-edit ks-icon\"></span>" + "</button>" +"&nbsp"+
                        // "<button class='btn btn-outline-danger ks-no-text ks-solid deletevisionButton' title='Delete' data-id='" + response.id + "'> " + "<span class=\"la la-trash ks-icon\"></span>" + "</button></td>" +
                        "<td><div class='ks-controls dropdown'>" +
                        "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                        "<span class='la la-ellipsis-h'></span></a>" +
                        "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
                        "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
                        "<a class='dropdown-item editVisionButton' href='#' data-id='" + response.id + "' data-toggle='modal' data-target='#updateVisionModal'>" +
                        "<span class='la la-pencil ks-icon'></span>Edit</a>" +
                        "<a class='dropdown-item deletevisionButton' href='#' data-id='" + response.id + "'>" +
                        "<span class='la la-trash ks-icon'></span>Delete</a>" +
                        // "<a class='dropdown-item assignVisionLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target=''>" +
                        // "<span class='la la-users ks-icon'></span>Assign</a>" +
                        "<a class='dropdown-item editVisionButton' href='vision-detail/"+response.id+"' data-id='" + response.id + "'>" +
                        "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
                        "</div>" +
                        "</div></td>" +
                        "</tr>"
                    );

                    swal({
                        icon: "success",
                        text: "updated successfully!"
                    });
                    $("#visionUpdateForm")[0].reset();
                    $("#updateVisionModal").modal("hide");
                },
                error: function (error) {
                    if (error.status == 405) {
                        window.location.href = "/denied";
                    }
                }
            });
        }

        // e.preventDefault();
        // var id          = $('#updatevisionId').val();
        // var name        = $('#updatevisionName').val();
        // var target      = $('#updateVisionTarget').val();
        // var description = $('#updateVisionDescription').val();
        // var startdate   = $('#updateVisionStartDate').val();
        // var enddate     = $('#updateVisionEndDate').val();
        // var token       = $('input[type="hidden"]').val();
        //
        //
        // $.ajax({
        //
        //     url: '/vision/' + id,
        //     type: 'put',
        //     data: {
        //         id: id,
        //         name: name,
        //         description: description,
        //         target: target,
        //         start_date:startdate,
        //         end_date:enddate,
        //         _token:token
        //
        //     },
        //     success: function (response) {
        //         $("#vision" + response.id).replaceWith("<tr id='vision" + response.id + "'>" +
        //             "<td>" + response.id + "</td>" +
        //             "<td>" + response.name + "</td>" +
        //             "<td>" + response.description + "</td>" +
        //             "<td>" + response.target + "</td>" +
        //             "<td>" + response.start_date + "</td>" +
        //             "<td>" + response.end_date + "</td>" +
        //             "<td>" + "Un Assigned" + "</td>" +
        //             "<td>" + "unlimited" + "</td>" +
        //             "<td><button class='btn btn-outline-primary ks-no-text ks-solid editVisionButton' data-toggle='modal' data-target='#updateVisionModal' title='Edit' data-id='" + response.id + "' id='visionUpdateButton'> " + "<span class=\"la la-edit ks-icon\"></span>" + "</button>" +"&nbsp"+
        //             "<button class='btn btn-outline-danger ks-no-text ks-solid deletevisionButton' title='Delete' data-id='" + response.id + "'> " + "<span class=\"la la-trash ks-icon\"></span>" + "</button></td>" +
        //             "</tr>"
        //         );
        //
        //         swal({
        //             icon: "success",
        //             text: "updated successfully!"
        //         });
        //         $("#visionUpdateForm")[0].reset();
        //         $("#updateVisionModal").modal("hide");
        //     }
        //
        // });



    });











































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































    /*
        =================================================================
               Maria  Work
        =================================================================
        */
    /* Validation on select kpi field*/

    $("#kpi-dropDown").blur(function () {
        validateSelectKPI();
    });

    function validateSelectKPI() {
        var selectKpi = $("#kpi-dropDown").val();
        {
            if (selectKpi == "")
            {
                $("#kpi-dropDown").css({"border": "1px solid red",});
                $("#select-goal-has-error").text("Invalid Kpi").css({"color": "red"});
            }
            else
            {
                $("#kpi-dropDown").css({"border": "1px solid green",});
                $("#select-goal-has-error").text("");
            }
        }
    }

    /* Validation on select goal data entry mode*/

    $("#goal-data-entry-mode").blur(function () {
        validateSelectDataEntryMode();
    });

    function validateSelectDataEntryMode() {
        var selectDataEntryMode = $("#goal-data-entry-mode").val();
        {
            if (selectDataEntryMode == "")
            {
                $("#goal-data-entry-mode").css({"border": "1px solid red",});
                $("#goal-data-entry-mode-has-error").text("Invalid Data ").css({"color": "red"});
            }
            else
            {
                $("#goal-data-entry-mode").css({"border": "1px solid green",});
                $("#goal-data-entry-mode-has-error").text("");
            }
        }
    }

    /* Validation on Goal name field*/

    $("#goal-name").blur(function () {
        validateGoalName();
    });

    function validateGoalName() {
        var goalName = $("#goal-name").val();
        {
            if (goalName == "")
            {
                $("#goal-name").css({"border": "1px solid red",});
                $("#goal-name-has-error").text("Invalid Goal name").css({"color": "red"});
            }
            if(!/^[a-zA-Z\s]+$/.test(goalName)) {
                $("#goal-name").css({
                    "border": "1px solid red"

                });

                $("#goal-name-has-error").html("Goal name must be in Alphabets").css({
                    "font-size": "12px",
                    "color": "red"
                });
                return true;
            }
            else
            {
                $("#goal-name").css({"border": "1px solid green",});
                $("#goal-name-has-error").text("");
            }
        }
    }

    /* Validation on Goal target field*/

    $("#goal-target").blur(function () {
        validateGoalTarget();
    });

    function validateGoalTarget() {
        var kpiTarget = $("#goal-target").val();
        {
            if (kpiTarget == "")
            {
                $("#goal-target").css({"border": "1px solid red",});
                $("#goal-target-has-error").text("Invalid Goal target").css({"color": "red"});
            }
            if( isNaN(parseInt(kpiTarget, 15)) ) {
                $("#goal-target").css({
                    "border":"1px solid red"
                });
                $("#goal-target-has-error").html("Invalid: e.g 10000").css({
                    "color":"red",
                    "font-size":"12px"

                });
                return true;
            }
            else
            {
                $("#goal-target").css({"border": "1px solid green",});
                $("#goal-target-has-error").text("");
            }
        }
    }

    /* Validation on Goal description field*/

    $("#goal-description").blur(function () {
        validateGoalDescription();
    });

    function validateGoalDescription() {
        var kpiDescription = $("#goal-description").val();
        {
            if (kpiDescription == "")
            {
                $("#goal-description").css({"border": "1px solid red",});
                $("#goal-description-has-error").text("Invalid Goal description").css({"color": "red"});
            }
            else
            {
                $("#goal-description").css({"border": "1px solid green",});
                $("#goal-description-has-error").text("");
            }
        }
    }

    /* Validation on Goal start date field*/

    $("#goal-start-date").change(function () {
        validateGoalStartDate();
    });

    function validateGoalStartDate() {
        var goalStartDate = $("#goal-start-date").val();
        {
            if (goalStartDate == "")
            {
                $("#goal-start-date").css({"border": "1px solid red",});
                $("#goal-start-date-has-error").text("Invalid Goal Start Date").css({"color": "red"});
            }
            else
            {
                $("#goal-start-date").css({"border": "1px solid green",});
                $("#goal-start-date-has-error").text("");
            }
        }
    }

    /* Validation on Goal end date field*/

    $("#goal-end-date").change(function () {
        validateGoalEndDate();
    });

    function validateGoalEndDate() {
        var goalEndDate = $("#goal-end-date").val();
        {
            if (goalEndDate == "")
            {
                $("#goal-end-date").css({"border": "1px solid red",});
                $("#goal-end-date-has-error").text("Invalid Goal End Date").css({"color": "red"});
            }
            else
            {
                $("#goal-end-date").css({"border": "1px solid green",});
                $("#goal-end-date-has-error").text("");
            }
        }
    }

    /* Validation on Goal  date submit* + Create Goal*/

    $("#create-goal-form").submit(function (e) {
        e.preventDefault();

        if (validateSelectKPI() || validateSelectDataEntryMode() || validateGoalName() || validateGoalTarget() || validateGoalDescription() || validateGoalStartDate() || validateGoalEndDate() )
        {
            swal("Error", "Please fill the form correctly", "error");
            validateSelectKPI();
            validateSelectDataEntryMode();
            validateGoalName();
            validateGoalTarget();
            validateGoalDescription();
            validateGoalStartDate();
            validateGoalEndDate();
            //return false;
        }
        else
        {
            var selectKpi            = $("#kpi-dropDown :selected").val();
            var loggedInUser         = $("#logged-in-user").val();
            var selectDataEntryMode  = $("#goal-data-entry-mode").val();
            var goalName             = $("#goal-name").val();
            var goalTarget            = $("#goal-target").val();
            var goalDescription       = $("#goal-description").val();
            var goalStartDate        = $("#goal-start-date").val();
            var goalEndDate          = $("#goal-end-date").val();
            var token                   =$('input[type="hidden"]').val();
            $.ajax({
                url:'/goal',
                method:'post',
                data:{
                    kpi_id:selectKpi,
                    user_id:loggedInUser,
                    name : goalName,
                    target : goalTarget,
                    description : goalDescription,
                    start_date : goalStartDate,
                    end_date : goalEndDate,
                    goal_data_entry_mode : selectDataEntryMode,
                    _token : token

                },
                success:function(response){
                    /*$('.goals-table').append("<tr id='goal" + response.id + "'>" +
                        "<td>" + response.id + "</td>" +
                        "<td>" + response.name + "</td>" +
                        "<td>" + response.description + "</td>" +
                        "<td>" + response.target + "</td>" +
                        "<td>" + response.start_date + "</td>" +
                        "<td>" + response.end_date + "</td>" +
                       // "<td>" + response.status + "</td>" +
                        "<td>" + response.goal_data_entry_mode + "</td>" +
                        "<td>"+moment(response.end_date).from(response.start_date)+"</td>" +
                        "<td><div class='ks-controls dropdown'>" +
                        "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                        "<span class='la la-ellipsis-h'></span></a>"+
                        "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
                        "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
                        "<a class='dropdown-item edit-goal' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#updateGoalModal'>" +
                        "<span class='la la-pencil ks-icon'></span>Edit</a>" +
                        "<a class='dropdown-item goaldeleteButton' href='#' data-id='"+response.id+"'>" +
                        "<span class='la la-trash ks-icon'></span>Delete</a>" +
                        // "<a class='dropdown-item assignStrategyLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#assignGoalModal'>" +
                        // "<span class='la la-users ks-icon'></span>Assign</a>" +
                        "<a class='dropdown-item  view-level-modal' href='#"+response.id+"' data-id='"+response.id+"'>" +
                        "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
                        "</div>" +
                        "</div></td>" +
                        "</tr>"
                    );*/
                    swal({
                        icon: "success",
                        text: "Goal created successfully!"
                    });

                    $("#create-goal-form")[0].reset();
                    $("#createGoalModal").modal("hide");
                },
                error:function (error) {
                    if (error.status == 405)
                    {
                        window.location.href="/denied";
                    }
                }
            });
        }
    })
// /*++++++++++++++++++++++++++++++++++++++++++ Delete Goal+++++++++++++++++++++++++++++++++++++++++++++++++++++ */

    /*Deletion of goal record*/
    $(document).on("click",".goaldeleteButton",function () {
        var id = $(this).attr("data-id");
        var token  = $('input[type="hidden"]').val();

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this! ",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((willDelete) => {
            if(willDelete) {
                $.ajax({
                    url:'/goal/'+id,
                    method:"delete",
                    data:{_token:token},
                    success: function (data) {
                        swal("deleted!", "Goal deleted successfully!", "success");
                        $("#goal"+id).remove();
                    },
                    error:function (error) {
                        if (error.status == 405)
                        {
                            window.location.href="/denied";
                        }
                    }
                });
            }
        })
    });
/*+++++++++++++++++++++++++++++++++++++++++++++++Udpate Goal++++++++++++++++++++++++++++++++*/

    $(document).on('click', '.edit-goal', function ()
    {

        var id                  = $(this).closest("tr")["0"].children["0"].innerHTML;
        var goalName            = $(this).closest("tr")["0"].children["1"].innerHTML;
        var goalDescription     = $(this).closest("tr")["0"].children["2"].innerHTML;
        var goalTarget          = $(this).closest("tr")["0"].children["3"].innerHTML;
        var goalStartDate       = $(this).closest("tr")["0"].children["4"].innerHTML;
        var goalEndDate         = $(this).closest("tr")["0"].children["5"].innerHTML;
        var goalDataEntryMode   = $(this).closest("tr")["0"].children["6"].innerHTML;

        // console.log(goalName);
        $("#goal-id").val(id);
        $("#update-goal-name").val(goalName);
        $("#update-goal-description").val(goalDescription);
        $("#update-goal-target").val(goalTarget);
        $("#update-goal-start-date").val(goalStartDate);
        $("#update-goal-end-date").val(goalEndDate);
        $("#update-goal-data-entry-mode").val(goalDataEntryMode);
        // console.log(goalDataEntryMode);


         $("#goal-edit-form").submit(function (e) {

             e.preventDefault();
             var id                    = $('#goal-id').val();
             var name                  = $('#update-goal-name').val();
             var description           = $('#update-goal-description').val();
             var target                = $('#update-goal-target').val();
             var start_date            = $('#update-goal-start-date').val();
             var end_date              = $('#update-goal-end-date').val();
             var goal_data_entry_mode  = $('#update-goal-data-entry-mode').val();
             var token                 = $('input[type="hidden"]').val();

            if(validateEditSelectDataEntryMode() || validateEditGoalName() ||  validateEditGoalDescription() || validateEditGoalStartDate() || validateEditGoalEndDate())
            {
                swal("Error", "Please fill the form correctly", "error");
                validateEditSelectDataEntryMode();
                validateEditGoalName();
                validateEditGoalDescription();
                validateEditGoalStartDate();
                validateEditGoalEndDate();
            }
            else
            {
                $.ajax({

                    url: '/goal/'+id,
                    type: 'put',
                    data: {
                        id: id,
                        name: name,
                        description: description,
                        target: target,
                        start_date: start_date,
                        end_date: end_date,
                        goal_data_entry_mode: goal_data_entry_mode,
                        _token: token
                    },
                    success: function (response) {
                        $("#goal" + response.id).replaceWith("<tr id='goal" + response.id + "'>" +
                            "<td>" + response.id + "</td>" +
                            "<td>" + response.name + "</td>" +
                            "<td>" + response.description + "</td>" +
                            "<td>" + response.target + "</td>" +
                            "<td>" + response.start_date + "</td>" +
                            "<td>" + response.end_date + "</td>" +
                            "<td>" + response.status + "</td>" +
                            "<td>" + response.goal_data_entry_mode + "</td>" +
                            /*"<td><button class='btn btn-outline-primary ks-no-text ks-solid edit-goal' id='editButton' data-toggle='modal' data-target='#EditModal' title='Edit' data-id='" + response.id + "' id='packageUpdateButton'> " + "<span class=\"la la-edit ks-icon\"></span>" + "</button>" +
                            "<button class='btn btn-outline-danger ks-no-text ks-solid deleteButton' title='Delete' data-id='" + response.id + "'> " + "<span class=\"la la-trash ks-icon\"></span>" + "</button></td>" +*/
                            "<td><div class='ks-controls dropdown'>" +
                            "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
                            "<span class='la la-ellipsis-h'></span></a>"+
                            "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
                            "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
                            "<a class='dropdown-item edit-goal' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#updateGoalModal'>" +
                            "<span class='la la-pencil ks-icon'></span>Edit</a>" +
                            "<a class='dropdown-item goaldeleteButton' href='#' data-id='"+response.id+"'>" +
                            "<span class='la la-trash ks-icon'></span>Delete</a>" +
                            // "<a class='dropdown-item assignStrategyLink' href='#' data-id='"+response.id+"' data-toggle='modal' data-target='#assignGoalModal'>" +
                            // "<span class='la la-users ks-icon'></span>Assign</a>" +
                            // "<a class='dropdown-item  view-level-modal' href='#"+response.id+"' data-id='"+response.id+"'>" +
                            "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
                            "</div>" +
                            "</div></td>" +
                            "</tr>"
                        );

                        swal({
                            icon: "success",
                            text: "Goal updated successfully!"
                        });
                        $("#goal-edit-form")[0].reset();
                        $("#updateGoalModal").modal("hide");
                    },
                    error:function (error) {
                        if (error.status == 405)
                        {
                            window.location.href="/denied";
                        }
                    }
                });
            }
         });

    });
/*+++++++++++++++++++++++++++++++++++++++++++++ display specific goal against KPI++++++++++++++++++++++*/
    $(document).on("click", ".display-kpi", function () {
        // on click removing the content from the table's body
        $("#ks-datatable tbody").html("");
        var kpiId = $(this).data("id");
        var url = 'goals/' + kpiId;
        var type = 'get';
        var data = "";
        var functionName = "populateGoalTable";
        var modalName = "";
        var formName = "";
        var tableOrRowId = "";
        var updateModalName = "";
        var message = "";

        //  calling generic ajax function
        performAjaxRequest(url, type, data, modalName, message, functionName, formName, tableOrRowId, updateModalName);
    });
/*+++++++++++++++++++++++++++++++++++++++++++++Assign Goal to Users+++++++++++++++++++++++++*/
    /* Validation on assign goal */

    $("#assign-goal").click(function () {
        validateUsers();
    });

    function validateUsers() {
        var selectUser = $("#assign-privileges-to-users").val();
        {
            if (selectUser == "")
            {
                $("#assign-privileges-to-users").css({"border": "1px solid red",});
                $("#assign-goal-has-error").text("Invalid User").css({"color": "red"});
            }
            else
            {
                $("#assign-privileges-to-users").css({"border": "1px solid green",});
                $("#assign-goal-has-error").text("");
            }
        }
    }




    /*++++++++++++++++++++++++++++++++++++++++++++++ User Form Validation++++++++++++++++++++++*/
    /* Validation for add user form*/
    /*
            =================================================================
            01 - To Check User Name
            =================================================================
            */
    $("#user-name").blur(function () {
        isValidUserName();
    })
    $("#user-name").focus(function () {
        $("#user-name").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidUserName()
    {
        var userName = $("#user-name").val();
        if(userName == "") {
            $("#user-name").css({
                "border":"1px solid red",
            });
            $("#user-name-has-error").html("Invalid user name").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        }
        if(!/^[a-zA-Z]*$/g.test(userName)) {
            $("#user-name").css({
                "border": "1px solid red"

            });

            $("#user-name-has-error").html("User name must be in Alphabets").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#user-name").css({
                "border":"1px solid green",
            });
            $("#user-name-has-error").empty();
        }
        return false;
    }

    //for checking last name
    $("#last-name").blur(function () {
        isValidlastName();
    })
    $("#last-name").focus(function () {
        $("#last-name").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidlastName()
    {
        var lastName = $("#last-name").val();
        if(lastName == "") {
            $("#last-name").css({
                "border":"1px solid red",
            });
            $("#user-lastname-has-error").html("Invalid last name").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        }
        if(!/^[a-zA-Z ]*$/g.test(lastName)) {
            $("#user-name").css({
                "border": "1px solid red"

            });

            $("#user-lastname-has-error").html("User name must be in Alphabets").css({
                "font-size": "12px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#last-name").css({
                "border":"1px solid green",
            });
            $("#user-lastname-has-error").empty();
        }
        return false;
    }
    $(".country").blur(function () {
        isValidcountryName();
    });
    $(".country").focus(function () {
        $(".country").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff"
        });
    });
    function isValidcountryName()
    {
        var country = $(".country :selected").val();
        if(country == "") {
            $(".country").css({
                "border":"1px solid red",
            });
            $("#user-country-has-error").html("Enter country name").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        }
        else {
            $("#user-country-has-error").empty();
            $(".country").css({
                "border":"1px solid green"
            });
            }
         return false;
    }


    //for checking  state
    $(".state").blur(function () {
        isValidprovinceName();
    })
    $(".state").focus(function () {
        $(".state").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidprovinceName()
    {
        var province = $(".state").val();
        if(province == "") {
            $(".state").css({
                "border":"1px solid red",
            });
            $("#user-state-has-error").html("Enter province name").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        }
        else
        {
            $("#user-state-has-error").empty();
            $(".state").css({
                "border":"1px solid green"
            });
        }

        return false;
    }
    // //for checking  city
    $(".city").blur(function () {
        isValidcityName();
    })
    $(".city").focus(function () {
        $(".city").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidcityName()
    {
        var city = $(".city :selected").val();
        if(city == "") {
            $(".city").css({
                "border":"1px solid red",
            });
            $("#user-city-has-error").html("Enter city name").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        }
        else
            {
                $("#user-city-has-error").empty();
                $(".city").css({
                    "border":"1px solid green"
                });
            }

        return false;
    }
    /*
    /*
           =================================================================
           02 - To Check password
           =================================================================
           */
    $("#user-password").blur(function () {
        isValidpassword();
    });

    $("#user-password").focus(function () {
        $("#user-password").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff"
        });
    });
    function isValidpassword()
    {
        var password = $("#user-password").val();
        var passwordLenght = password.length;

        if(password == "") {
            $("#user-password").css({
                "border":"1px solid red"
            });
            $("#user-password-error").html("Invalid password").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        }
        else {
            if( passwordLenght < 8 ) {
                $("#user-password").css({
                    "border": "1px solid red"
                });
                $("#user-password-error").html("atleast 8 digits long").css({
                    "font-size": "12px",
                    "color": "red"
                });
                return true;
            }
           else
            {
                $("#user-password").css({
                    "border":"1px solid green",
                });
                $("#user-password-error").empty();
            }
            return false;
        }


    }

    /*
            =================================================================
            02 - To Check Company Email
            =================================================================
            */
    $("#user-email").blur(function () {
        isValidUserEmail();
    })
    $("#user-email").focus(function () {
        $("#user-email").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidUserEmail()
    {
        var userEmail = $("#user-email").val();
        if(userEmail == "") {
            $("#user-email").css({
                "border":"1px solid red",
            });
            $("#user-email-has-error").html("Invalid user email").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        } else {
            if(isValidEmailAddress(userEmail))
            {
                $("#user-email").css({
                    "border":"1px solid green",
                });
                $("#user-email-has-error").empty();
            }else {
                $("#user-email-has-error").html("Please Enter Valid Email").css({
                    "color":"red",
                    "font-size":"13px",
                    "border-radius": "4px",
                });
            }
        }
        return false;
    }
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
        return pattern.test(emailAddress);
    }

    /*
           =================================================================
           09 - To Check User Designation
           =================================================================
           */
    $("#user-designation").blur(function () {
        isValidUserDesignation();
    })
    $("#user-designation").focus(function () {
        $("#user-designation").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidUserDesignation()
    {
        var userDesignation = $("#user-designation").val();
        if(userDesignation == "") {
            $("#user-designation").css({
                "border":"1px solid red",
            });
            $("#user-designation-has-error").html("Invalid user designation").css({
                "color":"red",
                "font-size":"13px",
                "border-radius": "4px",
            });
            return true;
        }
        if(!/^[a-zA-Z ]*$/g.test(userDesignation)) {
            $("#user-designation").css({
                "border": "1px solid red"

            });

            $("#user-designation-has-error").html("Invalid designation").css({
                "font-size": "14px",
                "color": "red"
            });
            return true;
        }
        else {
            $("#user-designation").css({
                "border":"1px solid green",
            });
            $("#user-designation-has-error").empty();
        }
        return false;
    }

    /* Validation on select kpi field*/

    $("#levelDropDown").blur(function () {
        validateSelectLevel();
    });

    function validateSelectLevel() {
        var selectLevel = $("#levelDropDown :selected").val();
        {
            if (selectLevel == "")
            {
                $("#levelDropDown").css({"border": "1px solid red",});
                $(".selectlevelError").text("Invalid Level").css({"color": "red"});
            }
            else
            {
                $("#levelDropDown").css({"border": "1px solid green",});
                $(".selectlevelError").empty();
            }
        }
    }

    /*
            =================================================================
            05 - To Check User Address
            =================================================================
            */
    $("#user-address").blur(function () {
        isValidUserAddress();
    })
    $("#user-address").focus(function () {
        $("#user-address").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidUserAddress()
    {
        var userAddress = $("#user-address").val();
        if(userAddress == "") {
            $("#user-address").css({
                "border":"1px solid red",
            });
            $("#user-address-has-error").html("Invalid user address").css({
                "color":"red",
                "font-size":"12px",
                "border-radius": "4px",
            });
            return true;
        } else {
            $("#user-address").css({
                "border":"1px solid green",
            });
            $("#user-address-has-error").empty();
        }
        return false;
    }

    /*
            =================================================================
            06 - To Check User contact
            =================================================================
            */
    $("#user-contact").blur(function () {
        isValidUserContact();
    })
    $("#user-contact").focus(function () {
        $("#user-contact").css({
            "border":"1px solid #D0D0D0",
            "background":"#fff",
        });
    })
    function isValidUserContact()
    {
        var userContact = $("#user-contact").val();
        if(userContact == "") {
            $("#user-contact").css({
                "border":"1px solid red",
            });
            $("#user-contact-has-error").html("Invalid user contact").css({
                "color":"red",
                "font-size":"13px",
                "border-radius": "4px",
            });
            return true;
        }
        // if( !/^[0-9]*$/g.test(userContact) ) {
        //     $("#user-contact").css({
        //         "border":"1px solid red"
        //     });
        //     $("#user-contact-has-error").html("Invalid: e.g 0900112222").css({
        //         "color":"red",
        //         "font-size":"12px"
        //
        //     });
        //     return true;
        // }
        // else {
        //     $("#user-contact").css({
        //         "border":"1px solid green",
        //     });
        //     $("#user-contact-has-error").empty();
        // }
        return false;
    }

    // $("#user-contact").blur(function () {
    //     var userContact = $("#user-contact").val();
    //     if(userContact == "") {
    //         $("#user-contact").css({
    //             "border":"1px solid red",
    //         });
    //         $("#user-contact-has-error").html("Enter user contact").css({
    //             "color":"red",
    //             "font-size":"13px",
    //             "border-radius": "4px",
    //         });
    //         return true;
    //     }
    // })
    var telInput = $("#user-contact"),
        errorMsg = $("#error-msg"),
        validMsg = $("#valid-msg");

// initialise plugin
    telInput.intlTelInput({
        utilsScript: "../../build/js/utils.js"
    });

    var reset = function() {
        telInput.removeClass("error");
        errorMsg.addClass("hide");
        validMsg.addClass("hide");
    };

// on blur: validate
    telInput.blur(function() {
        reset();
        if ($.trim(telInput.val())) {
            if (telInput.intlTelInput("isValidNumber")) {
                validMsg.removeClass("hide");
                $("#user-contact-has-error").empty();
                $("#user-contact").css({
                    "border":"1px solid green"
                });

            } else {
                $("#user-contact-has-error").empty();
                telInput.addClass("error");
                $("#user-contact").css({
                            "border":"1px solid red"
                        });
                errorMsg.removeClass("hide");
            }
        }
    });

// on keyup / change flag: reset
    telInput.on("keyup change", reset);

    /*
            =================================================================
            11 - To Check Submit
            =================================================================
            */

    // $("#add-user").click(function () {
    //     var userName        = $("#user-name").val();
    //     var userEmail       = $("#user-email").val();
    //     var userDesignation = $("#user-designation").val();
    //     var userAddress     = $("#user-address").val();
    //     var userContact     = $("#user-contact").val();
    //
    //     if (isValidUserName() || isValidUserEmail() || validateSelectLevel()|| isValidUserDesignation() || isValidUserAddress() || isValidUserContact())
    //     {
    //         isValidUserName();
    //         isValidUserEmail();
    //         isValidUserDesignation();
    //         isValidUserAddress();
    //         isValidUserContact();
    //         validateSelectLevel();
    //         return false;
    //     }else {
    //         return true;
    //     }
    // });

    /*++++++++++++++++++++++++++++++++++++++++ Date Picker+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/



    /*++++++++++++++++++++++++++++++++++++++++ Validation for update goal modal+++++++++++++++++++++++++++*/

    /* Validation on select goal data entry mode*/

    $("#update-goal-data-entry-mode").blur(function () {
        validateEditSelectDataEntryMode();
    });

    function validateEditSelectDataEntryMode() {
        var editSelectDataEntryMode = $("#goal-data-entry-mode").val();
        {
            if (editSelectDataEntryMode != 0)
            {
                $("#update-goal-data-entry-mode").css({"border": "1px solid red",});
                $("#update-goal-data-entry-mode-has-error").text("Invalid Data ").css({"color": "red"});
            }
            else
            {
                $("#update-goal-data-entry-mode").css({"border": "1px solid green",});
                $("#update-goal-data-entry-mode-has-error").text("");
            }
        }
    }

    /* Validation on Goal name field*/

    $("#update-goal-name").blur(function () {
        validateEditGoalName();
    });

    function validateEditGoalName() {
        var editGoalName = $("#update-goal-name").val();
        {
            if (editGoalName == "")
            {
                $("#update-goal-name").css({"border": "1px solid red",});
                $("#update-goal-name-has-error").text("Invalid Goal name").css({"color": "red"});
            }
            else
            {
                $("#update-goal-name").css({"border": "1px solid green",});
                $("#update-goal-name-has-error").text("");
            }
        }
    }

    /* Validation on Goal target field*/

    $("#update-goal-target").blur(function () {
        validateEditGoalTarget();
    });

    function validateEditGoalTarget() {
        var editGoalTarget = $("#update-goal-target").val();
        {
            if (editGoalTarget == "")
            {
                $("#update-goal-target").css({"border": "1px solid red",});
                $("#update-goal-target-has-error").text("Invalid Goal target").css({"color": "red"});
            }
            else
            {
                $("#update-goal-target").css({"border": "1px solid green",});
                $("#update-goal-target-has-error").text("");
            }
        }
    }

    /* Validation on Goal description field*/

    $("#update-goal-description").blur(function () {
        validateEditGoalDescription();
    });

    function validateEditGoalDescription() {
        var editGoalDescription = $("#update-goal-description").val();
        {
            if (editGoalDescription == "")
            {
                $("#update-goal-description").css({"border": "1px solid red",});
                $("#update-goal-description-has-error").text("Invalid Goal description").css({"color": "red"});
            }
            else
            {
                $("#update-goal-description").css({"border": "1px solid green",});
                $("#update-goal-description-has-error").text("");
            }
        }
    }

    /* Validation on Goal start date field*/

    $("#update-goal-start-date").blur(function () {
        validateEditGoalStartDate();
    });

    function validateEditGoalStartDate() {
        var editGoalStartDate = $("#update-goal-start-date").val();
        {
            if (editGoalStartDate == "")
            {
                $("#update-goal-start-date").css({"border": "1px solid red",});
                $("#update-goal-start-date-has-error").text("Invalid Goal Start Date").css({"color": "red"});
            }
            else
            {
                $("#update-goal-start-date").css({"border": "1px solid green",});
                $("#update-goal-start-date-has-error").text("");
            }
        }
    }

    /* Validation on Goal end date field*/

    $("#update-goal-end-date").blur(function () {
        validateEditGoalEndDate();
    });

    function validateEditGoalEndDate() {
        var editGoalEndDate = $("#update-goal-end-date").val();
        {
            if (editGoalEndDate == "")
            {
                $("#update-goal-end-date").css({"border": "1px solid red",});
                $("#update-goal-end-date-has-error").text("Invalid Goal End Date").css({"color": "red"});
            }
            else
            {
                $("#update-goal-end-date").css({"border": "1px solid green",});
                $("#update-goal-end-date-has-error").text("");
            }
        }
    }
    /*+++++++++ Continue+++++++++++++++*/
 $('#disable').submit(function () {
     var id = $(this).attr("data-id");
     var status = $(this).attr("data-status");
     // console.log(status);
     var token  = $('input[type="hidden"]').val();


     $.ajax({
         url:'/super-admin/'+id,
         method:"put",
         data:{

         },
         success: function (data) {
             swal("disable!", "company deleted successfully!", "success");

         }
     });

 })

    /*+++++++++++++++++++++++++++++++++++++ Fetch Kpi Date+++++++++++++++++++++++++++++++++++++++*/
    //function to fetch start date and end date of the vision that the user selected
    // so that we can restrict user from creating a strategy lower than or higher than vision date

    function fetchKpiDate() {

        var selectedKpiId = $("#kpi-dropDown").val();
        if (selectedKpiId != "")
        {
            //ajax call for fetching dates for the selected vision
            $.ajax({
                url:'kpi/'+selectedKpiId+'/date',
                method:'get',
                success:function (data) {
                    // on response destroying the datepicker else it does not pick the next
                    // value instead it displays the range of previously selected range
                    $('#goal-start-date').datepicker('destroy');
                    $('#goal-end-date').datepicker('destroy');

                    // setting the maximum and minimum dates for the strategy
                    // (should not be greater than the start and end date of vision
                    // also changing the placeholder with the vision's start and end date.)
                    // console.log(data);
                    $( "#goal-start-date" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: new Date(data.start_date),
                        maxDate: new Date(data.end_date)
                    }).attr("placeholder","Kpi start date is "+ (data.start_date).slice(0,10));

                    $( "#goal-end-date" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: new Date(data.start_date),
                        maxDate: new Date(data.end_date)
                    }).attr("placeholder","Kpi end date is " + (data.end_date).slice(0,10));
                }
            });
            return false;
        }
        else
        {
            return true;
        }
    }
    $("#kpi-dropDown").change(function () {
        fetchKpiDate();
        //validateSelectVision();
    });
/*++++++++++++++++++++++++++++ Strategy Date++++++++++++++++++++++++++++*/
    function fetchStrategyDate() {

        var selectedStrategyId = $("#strategyDropDown").val();
        if (selectedStrategyId != "")
        {
            //ajax call for fetching dates for the selected vision
            $.ajax({
                url:'strategy/'+selectedStrategyId+'/date',
                method:'get',
                success:function (data) {
                    // on response destroying the datepicker else it does not pick the next
                    // value instead it displays the range of previously selected range
                    $('#kpiStartDate').datepicker('destroy');
                    $('#kpiEndDate').datepicker('destroy');

                    // setting the maximum and minimum dates for the strategy
                    // (should not be greater than the start and end date of vision
                    // also changing the placeholder with the vision's start and end date.)
                    // console.log(data);
                    $( "#kpiStartDate" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: new Date(data.start_date),
                        maxDate: new Date(data.end_date)
                    }).attr("placeholder","Strategy start date is "+ (data.start_date).slice(0,10));

                    $( "#kpiEndDate" ).datepicker({
                        dateFormat: 'yy-mm-dd',
                        minDate: new Date(data.start_date),
                        maxDate: new Date(data.end_date)
                    }).attr("placeholder","Strategy end date is " + (data.end_date).slice(0,10));
                }
            });
            return false;
        }
        else
        {
            return true;
        }
    }




















































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































    /*
   =================================================================
           GoalData Work by tahira
   =================================================================
   */
    $(document).on("click",".display-goal",function ()
    {
        var id = $(this).attr("data-id");
        $.ajax({

            url:"goal-data/" +id,
            type:"get",

            success:function (response) {
                 // console.log(response);

                var mode =response[1].goal_data_entry_mode;
                var target =response[1].target;
                // console.log(mode);
                var name =response[1].name;
                var goal_id =response[1].id;
                var kpiname =response[2].name;
                var strategyname =response[3].name;
                var visionname =response[4].name;
                var goaldatas = response[5];
                var goaldataid = response[6];
                var goaldatacomment = response[7];

                real_goal_datas = [];


                // console.log(goaldatacomment);


                localStorage.clear();
                localStorage.setItem('goal_id', goal_id);
                localStorage.setItem('goalDataIds', JSON.stringify(goaldataid));

                 // console.log(goaldatas);


                $(".associated-vision").html(visionname).css({
                    "color": "#25628f",
                    "font-size": "24px",
                    "font-weight":"20px"

                });
                $(".associated-strategy").html(strategyname).css({
                    "color": "#25628f",
                    "font-size": "24px",
                    "font-weight":"20px"

                });
                $(".associated-kpi").html(kpiname).css({
                    "color": "#25628f",
                    "font-size": "24px",
                    "font-weight":"20px"

                });
                $(".associated-goal").html(name).css({
                    "color": "#25628f",
                    "font-size": "24px",
                    "font-weight":"20px"

                });

                // console.log(mode);
                if(mode== "Daily")
                {
                    $(".goal-name").html(name).css({
                        "color": "#42A5F5",
                        "font-size": "24px",
                        "font-weight":"20px",

                    });
                    var startDate = response[1].start_date;
                    var endDate = response[1].end_date;

                    var dateArray = getDates(startDate, endDate);
                    //console.log(dateArray);
                    var numberOfDays = getDates(startDate, endDate).length;

                    var htmlElements = '';
                    var tableData = '';

                    for (var i = 0; i < numberOfDays; i++)
                    {
                        var actual = goaldatas[i];
                        if (typeof actual === "undefined")
                        {
                            //console.log("Actual " + actual);
                            var actual_goaldata = "";
                        }
                        else
                        {
                           // console.log(actual.actual_data);
                            var actual_goaldata = actual.actual_data;
                            real_goal_datas[i] = actual_goaldata;
                        }
                        var comment = goaldatacomment[i];
                        // console.log(comment.comment);
                        if (typeof comment === "undefined")
                        {



                            // console.log(comment);

                            var comments = "";
                        }
                        else
                        {


                            var comments = comment.comment;

                            // var comments = [];
                           var comments = comment.comment;

                        }
                        // console.log(dateArray[i]);
                         htmlElements += '<th title=\'The actual KPI value for the selected date\' class=\'actual past new\' value='+dateArray[i]+'>'+dateArray[i]+'</th>';
                         tableData    += '<td class=\"actual past\">'+
                                        '<input type=\"tel\" tabindex="27" maxlength="15" autocomplete="off" class="target" value='+target+' style="margin-top: 5px;" readonly="readonly">'+

                                        '<input type=\"tell\" tabindex="20" autocomplete="off" maxlength="15" class="actual actualdata testing"  id="goal-data'+i+'" value='+ actual_goaldata+'  >'+

                                        '<input type="text" class="comments" id="goal-data-comment'+i+'" value='+ comments+'  ></input>'+
                                        '<input type="hidden" name="dataid" class="goaldataid" value ='+i+'>' +

                                        '</td>';

                        var currentDate = new Date().toISOString().slice(0, 10);
                        // console.log(currentDate);
                        // console.log(dateArray[i]);
                        if(currentDate == dateArray[i])
                        {
                            $(document).on("focus","#goal-data"+i,function () {
                                $(this).removeAttr('disabled');
                                //console.log('hi');
                            });
                            $(document).on("focus","#goal-data-comment"+i,function () {
                                $(this).removeAttr('disabled');
                                //console.log('hi');
                            });
                        }
                        else
                        {
                            $(document).on("focus","#goal-data"+i,function () {
                                $(this).prop("disabled",'false');
                                //console.log('hello');
                            });
                            $(document).on("focus","#goal-data-comment"+i,function () {
                                $(this).prop("disabled",'false');
                                //console.log('hello');
                            });
                        }
                    }

                    var dailyDatescontainer = document.getElementById("goal-dates");
                    dailyDatescontainer.innerHTML =htmlElements;
                    var actualAndTargetDivs = document.getElementById("target-and-actual");
                    actualAndTargetDivs.innerHTML = tableData;

                }
                else if((mode== "Weekly"))
                {

                    $(".goal-name").html(name).css({
                        "color": "#42A5F5",
                        "font-size": "24px",
                        "font-weight":"20px",
                    });
                    var startDate = response[1].start_date;
                    var endDate = response[1].end_date;

                    var weekArray = getWeeks(startDate, endDate);
                    // console.log(weekArray);
                    var numberOfWeeks = getWeeks(startDate, endDate).length;
                    //console.log(dateArray);
                    //console.log(numberOfDays);

                    var htmlElements ='';
                    var tableData = '';
                    for (var i = 0; i <numberOfWeeks; i++)
                    {
                        var actual = goaldatas[i];
                        if (typeof actual === "undefined")
                        {
                            // console.log("Actual " + actual);
                            var actual_goaldata = "";
                        }
                        else
                        {
                            // console.log(actual.actual_data);
                            var actual_goaldata = actual.actual_data;
                            real_goal_datas[i] = actual_goaldata;
                        }
                        var comment = goaldatacomment[i];
                        if (typeof comment === "undefined")
                        {



                            // console.log(comment);

                            var comments = "";
                        }
                        else
                        {



                            // console.log(comment);

                            var comments = comment.comment;
                        }
                        htmlElements += '<th title=\'The actual KPI value for the selected date\' class=\'actual past new\'  value='+weekArray[i]+'>'+weekArray[i]+'</th>';
                        tableData    += '<td class=\"actual past\">'+
                                        '<input type=\"tel\" tabindex="27" maxlength="15" autocomplete="off" class="target" value='+target+' style="margin-top: 5px;" readonly="readonly">'+
                                        '<input type=\"tell\" tabindex="20" autocomplete="off" maxlength="15" class="actual actualdata" id="goal-data'+i+'" value='+actual_goaldata+'>'+
                                         '<input type="text" class="comments" id="goal-data-comment'+i+'" value='+comments+'></input>'+
                                        '<input type="hidden" name="dataid" class="goaldataid" value ='+i+' >' +
                                        '</td>';
                        var yesterday = moment().subtract(1,'days').format('YYYY-MM-DD');
                        var weekStartDate = weekArray[i];
                        var weekEndDate = moment(weekArray[(weekArray.length)-1]).add(2, 'days').format("YYYY-MM-DD");
                        var weekDatesArray = getDates(weekStartDate,weekEndDate);

                        //console.log(weekDatesArray);
                        var numberOfWeekDays = getDates(weekStartDate, weekEndDate).length;
                        console.log(yesterday);
                        var isBool = undefined;
                        var currDate;
                        var j = 0;
                        var weekLastDate;
                        for(k = 0; k<weekArray.length; k++)
                        {
                            console.log(weekDatesArray[j]);

                            currDate = moment().format('YYYY-MM-DD');
                            //console.log('hi');
                            weekLastDate = moment(weekArray[k]).add(2, 'days').format("YYYY-MM-DD");

                            if(currDate >= weekArray[k] && currDate <= weekLastDate)
                            {
                                $(document).on("focus","#goal-data"+k,function () {
                                    $(this).removeAttr('disabled');
                                });
                                $(document).on("focus","#goal-data-comment"+k,function () {
                                    $(this).removeAttr('disabled');
                                });
                            }

                            /*if(weekDatesArray[j]<=weekArray[k])
                            {
                                $(document).on("focus","#goal-data"+k,function () {
                                    $(this).removeAttr('disabled');
                                });
                            }*/
                            else
                            {
                                $(document).on("focus","#goal-data"+k,function () {
                                    $(this).prop("disabled", 'false');
                                });
                                $(document).on("focus","#goal-data-comment"+k,function () {
                                    $(this).prop("disabled", 'false');
                                });
                            }
                        }






                    }

                    var weeklyDatescontainer = document.getElementById("goal-dates");
                    weeklyDatescontainer.innerHTML = htmlElements;
                    var actualAndTargetDivs = document.getElementById("target-and-actual");
                    actualAndTargetDivs.innerHTML = tableData;

                }
                else
                {
                    $(".goal-name").html(name).css({
                        "color": "#42A5F5",
                        "font-size": "24px",
                        "font-weight":"20px"

                    });

                    var startDate = response[1].start_date;
                    var endDate = response[1].end_date;

                    var monthArray = getMonths(startDate, endDate);
                    //console.log(dateArray);
                    var numberOfMonths = getMonths(startDate, endDate).length;
                    //console.log(dateArray);
                    //console.log(numberOfDays);

                    var htmlElements ='';
                    var tableData = '';
                    for (var i = 0; i < numberOfMonths; i++)
                    {  // console.log(monthArray[i]);
                        var actual = goaldatas[i];
                        if (typeof actual === "undefined")
                        {
                            //console.log("Actual " + actual);
                            var actual_goaldata = "";
                        }
                        else
                        {
                           // console.log(actual.actual_data);
                            var actual_goaldata = actual.actual_data;
                            real_goal_datas[i] = actual_goaldata;
                        }
                        var comment = goaldatacomment[i];
                        if (typeof comment === "undefined")
                        {
                            // console.log(comment);
                            var comments = "";
                        }
                        else
                        {
                            // console.log(comment);
                            var comments = comment.comment;
                        }
                         htmlElements += '<th type="date" title=\'The actual KPI value for the selected date\' class=\'actual past new\' value='+monthArray[i]+ '>'+monthArray[i]+'</th>';
                        tableData     +=  '<td class=\"actual past\">'+
                                         '<input type=\"tel\" tabindex="27" maxlength="15" autocomplete="off" class="target" value='+target+' style="margin-top: 5px;" readonly="readonly">'+
                                         '<input type=\"tell\" tabindex="20" autocomplete="off" maxlength="15" class="actual actualdata" id="goal-data'+i+'" value='+actual_goaldata+'>'+
                                         '<input type="text" class="comments" id="goal-data-comment'+i+'"  value='+comments+'></input>'+
                                         '<input type="hidden" name="dataid" class="goaldataid" value ='+i+' status = "no">' +
                                         '</td>';
                        var yesterday = moment().subtract(1,'days').format('YYYY-MM-DD');
                        var monthStartDate = monthArray[i];
                        var monthEndDate = moment(monthArray[(monthArray.length)-1]).add(14, 'days').format("YYYY-MM-DD");
                        var monthDatesArray = getDates(monthStartDate,monthEndDate);

                        //console.log(weekDatesArray);
                        var numberOfMonthDays = getDates(monthStartDate, monthEndDate).length;
                        console.log(yesterday);
                        var isBool = undefined;
                        var currDate;
                        var j = 0;
                        var monthLastDate;
                        for(k = 0; k<monthArray.length; k++)
                        {
                            console.log(monthDatesArray[j]);

                            currDate = moment().format('YYYY-MM-DD');
                            //console.log('hi');
                            monthLastDate = moment(monthArray[k]).add(14, 'days').format("YYYY-MM-DD");

                            if(currDate >= monthArray[k] && currDate <= monthLastDate)
                            {
                                $(document).on("focus","#goal-data"+k,function () {
                                    $(this).removeAttr('disabled');
                                });
                                $(document).on("focus","#goal-data-comment"+k,function () {
                                    $(this).removeAttr('disabled');
                                });
                            }

                            /*if(weekDatesArray[j]<=weekArray[k])
                            {
                                $(document).on("focus","#goal-data"+k,function () {
                                    $(this).removeAttr('disabled');
                                });
                            }*/
                            else
                            {
                                $(document).on("focus","#goal-data"+k,function () {
                                    $(this).prop("disabled", 'false');
                                });
                                $(document).on("focus","#goal-data-comment"+k,function () {
                                    $(this).prop("disabled", 'false');
                                });
                            }
                        }





                    }

                    var monthlyDatescontainer = document.getElementById("goal-dates");
                    monthlyDatescontainer.innerHTML = htmlElements;
                    var actualAndTargetDivs = document.getElementById("target-and-actual");
                    actualAndTargetDivs.innerHTML = tableData;

                }



                /*To get days between two dates*/
                function getDates(startDate, endDate) {
                    var dateArray = [];
                    var currentDate = moment(startDate);
                    var stopDate = moment(endDate);
                    while (currentDate <= stopDate) {
                        dateArray.push( moment(currentDate).format('YYYY-MM-DD') )
                        currentDate = moment(currentDate).add(1, 'days');
                    }
                    return dateArray;
                }

                /*To get weeks between two dates*/
                function getWeeks(startDate, endDate) {
                    var dateArray = [];
                    var currentDate = moment(startDate);
                    var stopDate = moment(endDate);
                    while (currentDate <= stopDate) {
                        dateArray.push( moment(currentDate).format('YYYY-MM-DD') )
                        currentDate = moment(currentDate).add(3, 'days');
                    }
                    return dateArray;
                }


                /*To get months between two dates*/
                function getMonths(startDate, endDate) {
                    var monthArray = [];
                    var currentDate = moment(startDate);
                    var stopDate = moment(endDate);
                    while (currentDate <= stopDate) {
                        monthArray.push( moment(currentDate).format('YYYY-MM-DD') )
                        currentDate = moment(currentDate).add(15
                            , 'days');
                    }
                    return monthArray;
                }
                //console.log(getDates(startDate, endDate));

            }
        });
    });


    // for saving data in db

    $("#goaldataForm").submit(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();


        let id = localStorage.getItem('goal_id');
        let goaldataid = JSON.parse(localStorage.getItem('goalDataIds'));

        var datesarray=[];

        var j = 0;
        var inputs = $(".new");
        for(j; j < inputs.length; j++){
            // console.log($(inputs[j]).attr("value"));
            datesarray[j] = $(inputs[j]).attr("value");
            // console.log(datesarray[j]);
        }
        // console.log(id);


        var dataarray=[];
        var i = 0;
        var inputs = $(".actualdata");
        for(i; i < inputs.length; i++){
            // console.log($(inputs[i]).val());
            dataarray[i] = $(inputs[i]).val();
            // console.log(dataarray);
        }
        // console.log(dataarray);

        var commentarray=[];
        var k = 0;
        var inputs = $(".comments");
        for(k; k < inputs.length; k++){
            // console.log($(inputs[i]).val());
            commentarray[k] = $(inputs[k]).val();
            // console.log(dataarray);
        }

        var formdata = $('.display-kpi').click(function () {
            $(this).each(function () {
                var data = $('.actualdata ').val();
                //console.log(data);
            });
        });
        //console.log(formdata);
        var dataIdsArray=[];
        var goaldata_ids = $(".goaldataid");
        var j;
        var changed_data_id;

        for(j =0; j < goaldata_ids.length; j++){
            dataIdsArray[j] = $(goaldata_ids[j]).val();
            if (dataarray[j] != real_goal_datas[j])
            {
                changed_data_id = parseInt(dataIdsArray[j]) + 1;
               // console.log("Old Value : " + real_goal_datas[j] + '<br>' +"New Value : " + dataarray[j] + "ID : " + changed_data_id);
               //  console.log(changed_data_id);
            }
        }






        var token  = $('input[type="hidden"]').val();
        // console.log("Goal data ids");
        // console.log(goaldataid);

        if(goaldataid == '')
        {
            $.ajax({
                url: 'goal-data',
                method: "post",
                data:{
                    goal_id:id,
                    goal_data_id:goaldataid,
                    data_entry_date:datesarray,
                    actual_data:dataarray,
                    comment:commentarray,
                    changed_goal_data_id: changed_data_id,
                    _token:token
                },
                success: function (data) {
                    swal({
                        icon: "success",
                        text: "Saved successfully!"
                    });
                },
                error:function (error) {
                    if (error.status == 405)
                    {
                        window.location.href="/denied";
                    }
                }
            });
        }
        else
        {
            $.ajax({
                url: 'goalData',
                method: "put",
                data:{
                    goal_id:id,
                    goal_data_id:goaldataid,
                    actual_data:dataarray,
                    comment:commentarray,
                    changed_goal_data_id: changed_data_id,
                    _token:token
                },
                success: function (data) {
                    loadingFunction();
                    swal({
                        icon: "success",
                        text: "Updated successfully!"
                    });
                },
                error:function (error) {
                    if (error.status == 405)
                    {
                        window.location.href="/denied";
                    }
                }
            });
        }
    });
    $("#save-goaldata").click(function () {
        window.location.href = $(this).data('href');
    });

    //Disable company
    $(".disable-company").click(function () {
       var id = $(this).attr('data-id');
       var status = $(this).attr('data-status');
        var token = $('input[type="hidden"]').val();
       console.log(status);
       $.ajax({
           url: 'company-disable/'+id,
           method: "put",
           data:{
               company_status:status,
               _token:token,
           },
           success: function (data){
               swal({
                   icon: "success",
                   text: "Company disabled successfully!"
               });
           }

       })
    });

    //Enable company
    $(".enable-company").click(function () {
        var id = $(this).attr('data-id');
        var status = $(this).attr('data-status');
        var token = $('input[type="hidden"]').val();
        console.log(status);
        $.ajax({
            url: 'company-enable/'+id,
            method: "put",
            data:{
                company_status:status,
                _token:token,
            },
            success: function (data){
                swal({
                    icon: "success",
                    text: "Company enabled successfully!"
                });
            }

        })
    });

/*+++++++++++++++++++++ Validation on goaldata form +++++++++++++++++++++++++++++++++*/
    $(".actual").blur(function () {
        isValidActualData();
    })
    $(".actual").focus(function () {
        $(".actual").css({
            "border":"0px",
            "background":"#fff",
        });
    })
    function isValidActualData()
    {
        var actualData = $(".actual").val();
        if( isNaN(parseInt(actualData, 15)) ) {
            $(".actual").css({
                "border":"1px solid red"
            });
            return true;
        }
        else {
            $(".actual").css({
                "border":"1px",
            });
        }
        return false;
    }
    $("#save-goaldata").click(function () {
        window.location.href = $(this).data('href');
    });
































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































































});





// generic function for ajax call
function performAjaxRequest(url,type,data,modalName,message,functionName,formName,tableOrRowId,updateModalName) {

    $.ajax({

        url:url,    // url passed in argument
        type:type,  // type passed in argument
        data:data,  // data passed in argument
        success:function (response) {


            //creating variable which will hold the object that contains the values and
            // their names which we will use in the function that we call on success function
            var parametersList = {
                tableOrRowId: tableOrRowId, response: response,
                updateModalName: updateModalName, modalName:modalName, formName:formName,message:message
            };
            // window is javascript object using this we can call a function without
            // parenthisis and for parameters we use the following.
           window [functionName](parametersList);
           // i.e appendRow(parameters);
        },
        error:function (error) {
            if (error.status == 405)
            {
                window.location.href="/denied";
            }
        }
    });
}

// function for appending row on creation of level
function appendRow(parametersList)
{

    swal({
        title: "Success",
        text: parametersList.messag,
        icon: "success",
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if(willDelete) {
            // using this method we can reidrect to a url
            // why i use this beacuase i want to reload the page when user assigned
            // permissions to the level because select 2 is not getting empty properly
            // after success also if the page is not refresh multiple calls sent
            // to the database for insertion (to avoid this)
            window.location.href = "level";
        }
    })
    // modal name passed in arguments
    $(parametersList.modalName).modal("hide");
    // form name passed in arguments
    $(parametersList.formName)[0].reset();

    // var parameters =  parametersList.response;
    // //  alert(parameters.name);
    // $(parametersList.tableOrRowId).append("<tr id='level"+parameters.id+"'  role='row'>" +
    //     "<td class='sorting_1'>"+parameters.name+"</td>" +
    //     "<td>"+ parameters.description+ "</td>" +
    //     "<td>"+ 0 + "</td>" +
    //     "<td>"+ 0 + "</td>" +
    //     "<td><button class='btn btn-outline-warning ks-no-text ks-solid view-level-modal' data-toggle='modal' " +
    //     "data-target='"+parametersList.updateModalName+"' " + "id='levelUpdateButton' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-edit ks-icon'></span></button>&nbsp;&nbsp;&nbsp;" +
    //     "<button class='btn btn-outline-danger ks-no-text ks-solid view-level-modal'" +
    //      "id='levelDeleteButton' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-trash ks-icon'></span></button>&nbsp;&nbsp;&nbsp;" +
    //     "</td></tr>");

}

// function for replacing row on updating level
function updateRow(parametersList) {

    // var parameters =  parametersList.response;
    // // getting the no of user from the table's <td>
    // var noOfUsers     = $("#level"+parameters.id).closest('tr')["0"].cells["2"].innerHTML;
    // var noOfResources = $("#level"+parameters.id).closest('tr')["0"].cells["3"].innerHTML;
    // swal("Success", parametersList.message, "success");
    swal({
        title: "Success",
        text: parametersList.messag,
        icon: "success",
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if(willDelete) {
            // using this method we can reidrect to a url
            // why i use this beacuase i want to reload the page when user assigned
            // permissions to the level because select 2 is not getting empty properly
            // after success also if the page is not refresh multiple calls sent
            // to the database for insertion (to avoid this)
            window.location.href = "level";
        }
    })
    // modal name passed in arguments
    // $(parametersList.modalName).modal("hide");
    // // form name passed in arguments
    // $(parametersList.formName)[0].reset();
    //
    //
    // //  alert(parameters.name);
    // $(parametersList.tableOrRowId).replaceWith("<tr id='level"+parameters.id+"'>" +
    //     "<td>"+parameters.name+"</td>" +
    //     "<td>"+ parameters.description+ "</td>" +
    //     "<td>"+noOfUsers + "</td>" +
    //     "<td>"+noOfResources + "</td>" +
    //     "<td><button class='btn btn-outline-warning ks-no-text ks-solid view-level-modal' data-toggle='modal' " +
    //     "data-target='"+parametersList.updateModalName+"' " + "id='levelUpdateButton' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-edit ks-icon'></span></button>&nbsp;&nbsp;&nbsp;" +
    //     "<button class='btn btn-outline-danger ks-no-text ks-solid view-level-modal'" +
    //     "id='levelDeleteButton' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-trash ks-icon'></span></button>&nbsp;&nbsp;&nbsp;" +
    //     "</td></tr>");

}

//function for removing row on deleting level
function deleteRow(parametersList) {
            // var parameters =  parametersList.response;
            // swal("deleted",parametersList.message,"success");
            // $(parametersList.tableOrRowId).remove();
            //  $("#parentLevel option[value="+parameters.id+"]").remove();
            //  $("#updateParentLevel option[value="+parameters.id+"]").remove();
    swal({
        title: "Success",
        text: parametersList.messag,
        icon: "success",
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if(willDelete) {
            // using this method we can reidrect to a url
            // why i use this beacuase i want to reload the page when user assigned
            // permissions to the level because select 2 is not getting empty properly
            // after success also if the page is not refresh multiple calls sent
            // to the database for insertion (to avoid this)
            window.location.href = "level";
        }
    })
}

// ######################## end ###############################################################

// populate strategy table
function populateStrategyTable(parametersList) {
    $.each(parametersList.response,function (i,data) {
    $("#ks-datatable").append("<tr id=strategy"+data.id+">" +
        "<td>"+data.name+"</td>" +
        "<td>"+data.description+"</td>" +
        // "<td>"+data.target+"</td>" +
        "<td>"+data.start_date+"</td>" +
        "<td>"+data.end_date+"</td>" +
        // "<td>"+data.status+"</td>" +
        "<td>"+ moment(data.end_date).from(data.start_date)+"</td>" +
        "<td><div class='ks-controls dropdown'>" +
        "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
        "<span class='la la-ellipsis-h'></span></a>"+
        "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
        "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
        "<a class='dropdown-item editStrategyLink' href='#' data-id='"+data.id+"' data-vision='"+data.vision_id+"' " +
        "data-toggle='modal' data-target='#updateStrategyModal'>" +
        "<span class='la la-pencil ks-icon'></span>Edit</a>" +
        "<a class='dropdown-item deleteStrategyLink' href='#' data-id='"+data.id+"'>" +
        "<span class='la la-trash ks-icon'></span>Delete</a>" +
        "<a class='dropdown-item showStrategyLink' href='strategy/"+data.id+"' data-id='"+data.id+"'>" +
        "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
        "</div>" +
        "</div></td>" +
        "</tr>");
    });
}


// populate KPI table
function populateKPITable(parametersList) {
    $.each(parametersList.response,function (i,data) {
        $("#ks-datatable").append("<tr id=kpi"+data.id+">" +
            "<td>"+data.id+"</td>" +
            "<td>"+data.name+"</td>" +
            "<td>"+data.description+"</td>" +
            "<td>"+data.target+"</td>" +
            "<td>"+data.start_date.slice(0,10)+"</td>" +
            "<td>"+data.end_date.slice(0,10)+"</td>" +
            // "<td>"+data.status+"</td>" +
            "<td>"+moment(data.end_date).from(data.start_date)+"</td>" +
            "<td><div class='ks-controls dropdown'>" +
            "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
            "<span class='la la-ellipsis-h'></span></a>"+
            "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
            "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
            "<a class='dropdown-item editKpiLink' href='#' data-id='"+data.id+"' data-toggle='modal' data-target='#updateKpiModal'>" +
            "<span class='la la-pencil ks-icon'></span>Edit</a>" +
            "<a class='dropdown-item deleteKpiLink' href='#' data-id='"+data.id+"'>" +
            "<span class='la la-trash ks-icon'></span>Delete</a>" +
            // "<a class='dropdown-item assignKpiLink' href='#' data-id='"+data.id+"' data-toggle='modal' data-target='#assignKpiModal'>" +
            // "<span class='la la-users ks-icon'></span>Assign</a>" +
            "<a class='dropdown-item showKpiLink' href='kpi-detail/"+data.id+"' data-id='"+data.id+"'>" +
            "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
            "</div>" +
            "</div></td>" +
            "</tr>");
    });
}

// populate Goal table
function populateGoalTable(parametersList) {
    $.each(parametersList.response,function (i,data) {
        $("#ks-datatable").append("<tr id=goal"+data.id+">" +
            "<td>"+data.id+"</td>" +
            "<td>"+data.name+"</td>" +
            "<td>"+data.description+"</td>" +
            "<td>"+data.target+"</td>" +
            "<td>"+data.start_date+"</td>" +
            "<td>"+data.end_date+"</td>" +
            "<td>"+data.goal_data_entry_mode+"</td>" +
            // "<td>"+data.status+"</td>" +
            "<td>"+moment(data.end_date).from(data.start_date)+"</td>" +
            "<td><div class='ks-controls dropdown'>" +
            "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
            "<span class='la la-ellipsis-h'></span></a>"+
            "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
            "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
            "<a class='dropdown-item edit-goal' href='#' data-id='"+data.id+"' data-toggle='modal' data-target='#updateGoalModal'>" +
            "<span class='la la-pencil ks-icon'></span>Edit</a>" +
            "<a class='dropdown-item goaldeleteButton' href='#' data-id='"+data.id+"'>" +
            "<span class='la la-trash ks-icon'></span>Delete</a>" +
            // "<a class='dropdown-item assignKpiLink' href='#' data-id='"+data.id+"' data-toggle='modal' data-target='#assignGoalModal'>" +
            // "<span class='la la-users ks-icon'></span>Assign</a>" +
            "<a class='dropdown-item edit-goal' href='goal/"+data.id+"' data-id='"+data.id+"'>" +
            "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
            "</div>" +
            "</div></td>" +
            "</tr>");
    });
}

// fucntion to append strategy row

function appendStrategyRow(parametersList) {

    swal({
        title: "Success",
        text: "Strategy Creaetd Successfully",
        icon: "success",
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if(willDelete) {
            // using this method we can reidrect to a url
            // why i use this beacuase i want to reload the page when user assigned
            // permissions to the level because select 2 is not getting empty properly
            // after success also if the page is not refresh multiple calls sent
            // to the database for insertion (to avoid this)
            window.location.href = "strategy";
        }
    })

    // var parameters =  parametersList.response;

    // $(".strategyTable").append("<tr id='strategy" + parameters.id + "'>" +
    //     "<td>"+parameters.name+"</td>" +
    //     "<td>"+parameters.description+"</td>" +
    //     "<td>"+parameters.target+"</td>" +
    //     "<td>"+parameters.start_date+"</td>" +
    //     "<td>"+parameters.end_date+"</td>" +
    //     "<td>"+parameters.status+"</td>" +
    //     "<td>" + "x time left" + "</td>" +
    //     "<td><div class='ks-controls dropdown'>" +
    //     "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
    //     "<span class='la la-ellipsis-h'></span></a>"+
    //     "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
    //     "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
    //     "<a class='dropdown-item editStrategyLink' href='#' data-id='"+parameters.id+"' data-vision='"+parameters.vision_id+"' " +
    //     "data-toggle='modal' data-target='#updateStrategyModal'>" +
    //     "<span class='la la-pencil ks-icon'></span>Edit</a>" +
    //     "<a class='dropdown-item deleteStrategyLink' href='#' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-trash ks-icon'></span>Delete</a>" +
    //     "<a class='dropdown-item assignStrategyLink' href='#' data-id='"+parameters.id+"' data-toggle='modal' data-target='#assignStrategyModal'>" +
    //     "<span class='la la-users ks-icon'></span>Assign</a>" +
    //     "<a class='dropdown-item showStrategyLink' href='strategy/"+parameters.id+"' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
    //     "</div>" +
    //     "</div></td>" +
    //     "</tr>"
    // );
  //  swal("Success",parametersList.message, "success");
    // modal name passed in arguments
    // $(parametersList.modalName).modal("hide");
    // // form name passed in arguments
    // $(parametersList.formName)[0].reset();
}

// updatestrategy row
function updateStrategyRow(parametersList) {
    swal({
        title: "Success",
        text: parametersList.messag,
        icon: "success",
        closeOnClickOutside: false,
    }).then((willDelete) => {
        if(willDelete) {
            // using this method we can reidrect to a url
            // why i use this beacuase i want to reload the page when user assigned
            // permissions to the level because select 2 is not getting empty properly
            // after success also if the page is not refresh multiple calls sent
            // to the database for insertion (to avoid this)
            window.location.href = "strategy";
        }
    })
    // swal("Success",parametersList.message, "success");
    // // modal name passed in arguments
    // $(parametersList.modalName).modal("hide");
    // // form name passed in arguments
    // $(parametersList.formName)[0].reset();
    //
    // var parameters =  parametersList.response;
    //
    // $(parametersList.tableOrRowId).replaceWith("<tr id='strategy" + parameters.id + "'>" +
    //     "<td>"+parameters.name+"</td>" +
    //     "<td>"+parameters.description+"</td>" +
    //     // "<td>"+parameters.target+"</td>" +
    //     "<td>"+parameters.start_date+"</td>" +
    //     "<td>"+parameters.end_date+"</td>" +
    //     "<td>"+parameters.status+"</td>" +
    //     "<td>" +moment(parameters.end_date).from(parameters.start_date) + "</td>" +
    //     "<td><div class='ks-controls dropdown'>" +
    //     "<a class='btn btn-link' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" +
    //     "<span class='la la-ellipsis-h'></span></a>"+
    //     "<div class='dropdown-menu dropdown-menu-right' x-placement='bottom-end' " +
    //     "style='position: absolute; transform: translate3d(64px,38px,0px); top: 0px; left: 0px; will-change: transfrom;'>" +
    //     "<a class='dropdown-item editStrategyLink' href='#' data-id='"+parameters.id+"' data-vision='"+parameters.vision_id+"' " +
    //     "data-toggle='modal' data-target='#updateStrategyModal'>" +
    //     "<span class='la la-pencil ks-icon'></span>Edit</a>" +
    //     "<a class='dropdown-item deleteStrategyLink' href='#' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-trash ks-icon'></span>Delete</a>" +
    //     // "<a class='dropdown-item assignStrategyLink' href='#' data-id='"+parameters.id+"' data-toggle='modal' data-target='#assignStrategyModal'>" +
    //     // "<span class='la la-users ks-icon'></span>Assign</a>" +
    //     "<a class='dropdown-item showStrategyLink' href='strategy/"+parameters.id+"' data-id='"+parameters.id+"'>" +
    //     "<span class='la la-bar-chart-o ks-icon'></span>Details</a>" +
    //     "</div>" +
    //     "</div></td>" +
    //     "</tr>"
    // );
}




// Vision Dashboard (Zeeshan)

function showVisionLineChart()
{
    $('#vision_line_chart').show();
    $('#vision_pie_dash_chart').hide();
    $('#vision_bar_dash_chart').hide();
    $('#strategy_line_chart').hide();
    $('#strategy_pie_dash_chart').hide();
    $('#strategy_bar_dash_chart').hide();
    $('#kpi_line_chart').hide();
    $('#kpi_pie_dash_chart').hide();
    $('#kpi_bar_dash_chart').hide();
    $('#goal_line_chart').hide();
    $('#goal_pie_dash_chart').hide();
    $('#goal_bar_dash_chart').hide();
}
function showVisionPieChart()
{
    $('#vision_pie_dash_chart').show();
    $('#vision_line_chart').hide();
    $('#vision_bar_dash_chart').hide();
    $('#strategy_line_chart').hide();
    $('#strategy_pie_dash_chart').hide();
    $('#strategy_bar_dash_chart').hide();
    $('#kpi_line_chart').hide();
    $('#kpi_pie_dash_chart').hide();
    $('#kpi_bar_dash_chart').hide();
    $('#goal_line_chart').hide();
    $('#goal_pie_dash_chart').hide();
    $('#goal_bar_dash_chart').hide();
}
function showVisionBarChart()
{
    $('#vision_pie_dash_chart').hide();
    $('#vision_line_chart').hide();
    $('#vision_bar_dash_chart').show();
    $('#strategy_line_chart').hide();
    $('#strategy_pie_dash_chart').hide();
    $('#strategy_bar_dash_chart').hide();
    $('#kpi_line_chart').hide();
    $('#kpi_pie_dash_chart').hide();
    $('#kpi_bar_dash_chart').hide();
    $('#goal_line_chart').hide();
    $('#goal_pie_dash_chart').hide();
    $('#goal_bar_dash_chart').hide();
}

$('#vision_pie_dash_chart').hide();
$('#vision_line_chart').hide();
$('#vision_bar_dash_chart').hide();

$(document).on("click", ".vision-line-chart", function (e) {
    e.preventDefault();
    showVisionLineChart();
});
$(document).on("click", ".vision-pie-chart", function (e) {
    e.preventDefault();
    showVisionPieChart();
});

$(document).on("click", ".vision-bar-chart", function (e) {
    e.preventDefault();
    showVisionBarChart();
});


$(document).on("click", ".vision-dashboard", function (e) {
    e.preventDefault();
    var vision_id = $(this).attr('data');
    //console.log(vision_id);
    $.ajax({

        url: "show-vision-dashboard",
        type: "get",
        data:
            {
                vision_id : vision_id,
            },
        success:function (response) {
            //console.log(response);
            var d_strategy_per = response[0];
            var d_strategy = response[1];
            var d_kpis_per = response[2];
            var d_kpis = response[3];
            var d_goals_per = response[4];
            var d_goals = response[5];
            var vision_left = 0;
            var vision_target = 0;
            $("#show-strategy-dropdown").empty();

            for (var d_strategy_length = 0; d_strategy_length < d_strategy.length; d_strategy_length++)
            {
                $("#show-strategy-dropdown").append(
                    "<a class='dropdown-item strategy-dashboard' href='#' data='"+ d_strategy[d_strategy_length].id+"'>" + d_strategy[d_strategy_length].name+"</a>"
                );
            }
            // Vision Dashboard
            google.charts.load('current', {'packages': ['corechart'], 'callback': visionDrawCharts});
            function visionDrawCharts(){
                visionBarDrawChart();
                visionLineDrawChart();
                visionPieDrawChart();
            }

            google.charts.load('current', {'packages':['table']});
            google.charts.setOnLoadCallback(visionFormatDrawChart);
            google.charts.setOnLoadCallback(visionStrategiesFormatDrawChart);

            function visionStrategiesFormatDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Strategy Name');
                data.addColumn('number', 'Target');

                vision_target = parseInt(d_strategy_per[d_strategy_length]) * 100;
                for (var d_strategy_length = 0; d_strategy_length < d_strategy.length; d_strategy_length++)
                {
                    var per = parseInt(100 - parseInt(d_strategy_per[d_strategy_length]));
                    vision_left += per;
                    if(per >0)
                    {

                        data.addRows([
                            [d_strategy[d_strategy_length].name, {v:-per, f: '-'+per+'%'}],

                        ]);
                    }
                    else
                    {
                        data.addRows([
                            [d_strategy[d_strategy_length].name, {v:per, f: '+'+per+'%'}],

                        ]);
                    }
                }


                var table = new google.visualization.Table(document.getElementById('vision-strategies-arrow-format-div'));
                var formatter = new google.visualization.ArrowFormat();
                formatter.format(data, 1);
                table.draw(data, {allowHtml: true, showRowNumber: true});
            }

            function visionFormatDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Vision Name');
                data.addColumn('number', 'Target');

               // vision_target = parseInt(d_strategy_per[d_strategy_length]) * 100;
                vision_target = parseInt(d_strategy.length) * 100;

                if (vision_left != 0)
                {
                    var vision_per = parseInt((parseInt(vision_left) / parseInt(vision_target)) * 100);
                }
                else
                {
                    vision_per = 0;
                }
                if (vision_per > 0)
                {
                    data.addRows([
                        [response[6].name, {v:-vision_per, f: '-'+vision_per+'%'}],
                    ]);
                }
                else
                {
                    data.addRows([
                        [response[6].name, {v:vision_per, f: '+'+vision_per+'%'}],
                    ]);
                }


                var table = new google.visualization.Table(document.getElementById('vision-arrow-format-div'));
                var formatter = new google.visualization.ArrowFormat();
                formatter.format(data, 1);
                table.draw(data, {allowHtml: true, showRowNumber: true});
            }


            function visionLineDrawChart() {
                var data = new google.visualization.DataTable();
                //data.addColumn('date', 'Hire Date');

                data.addColumn('string', 'KPI Name');
                data.addColumn('number', 'KPI Completed');

                for (var d_strategy_length = 0; d_strategy_length < d_strategy.length; d_strategy_length++)
                {
                    data.addRows([
                        [d_strategy[d_strategy_length].name , d_strategy_per[d_strategy_length]],
                    ]);
                }

                var options = {
                    title: 'Company Performance',
                    width:1000,
                    height:480,
                    curveType: 'function',
                    pointSize: 20,
                    legend: { position: 'bottom' }
                };
                var chart = new google.visualization.LineChart(document.getElementById('vision_curve_chart'));


                chart.draw(data, options);

                showVisionLineChart();
            } //End KPI Line Chart
            // Start Pie Chart

            function visionPieDrawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Strategy Name');
                data.addColumn('number', 'Strategy Completed');
                data.addRows(3);
                for (var d_strategy_length = 0; d_strategy_length < d_strategy.length; d_strategy_length++)
                {
                    for (var v =0; v<2; v++)
                    {
                        var strategy_name = d_strategy[d_strategy_length].name;
                        if (v == 0)
                            data.setCell(d_strategy_length, v, strategy_name);
                        else
                            data.setCell(d_strategy_length, v, d_kpis_per[d_strategy_length]);
                    }
                }
                var optionsPie = {
                    title: 'My Daily Activities',
                    is3D: true,
                    width:1100,
                    height:480,
                };
                var chartPie = new google.visualization.PieChart(document.getElementById('vision_pie_chart'));

                chartPie.draw(data, optionsPie);

            } // End KPI Pie Chart

            function visionBarDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'KPI Name');
                data.addColumn('number', 'KPI Completed');
                //data.addColumn('number', 'Left');
                for (var d_strategy_length = 0; d_strategy_length < d_strategy.length; d_strategy_length++)
                {
                    data.addRows([
                        [d_strategy[d_strategy_length].name , d_strategy_per[d_strategy_length]],
                    ]);
                }

                var barOptions = {
                    legend: { position: 'bottom' },
                    width:1000,
                    height:480,
                    chart: {
                        title: 'Goal Performance',
                        //subtitle: 'Based on most recent and previous census data'
                    },
                    hAxis: {
                        title: 'Goal Achieved'
                    },
                    vAxis: {
                        title: 'Working Duration'
                    },
                    bars: 'vertical',

                    axes: {
                        x: {
                            2010: {label: '2010 Population (in millions)', side: 'top'},
                            2000: {label: '2000 Population'}
                        }
                    },
                };
                var barChart = new google.visualization.ColumnChart(document.getElementById('vision_bar_chart'));
                barChart.draw(data, barOptions);
                //$('#strategy_bar_dash_chart').show();

            }   // End strategy Bar cHART

        }
    });
});// ENd vision dashboard

// Strategy Dashboard (Zeeshan)

function showStrategyCharts()
{
    $('.show-strategy-chart').show();
    $('.show-kpi-chart').hide();
    $('.show-goal-chart').hide();
}



$(document).on("click", ".strategy-line-chart", function (e) {
    e.preventDefault();
    showStrategyLineChart();
});
$(document).on("click", ".strategy-pie-chart", function (e) {
    e.preventDefault();
    showStrategyPieChart();
});

$(document).on("click", ".strategy-bar-chart", function (e) {
    e.preventDefault();
    showStrategyBarChart();
});

$(document).on("click", ".strategy-dashboard", function (e) {
    e.preventDefault();
    var strategy_id = $(this).attr('data');
    $.ajax({

        url: "show-strategy-dashboard",
        type: "get",
        data:
            {
                strategy_id : strategy_id,
            },
        success:function (response) {

            showStrategyCharts();

            var d_kpis_per = response[0];
            var d_kpis = response[1];
            var d_goals_per = response[2];
            var d_goals = response[3];
            var d_strategy_remaining = response[4];
            var strategy_target = 0;
            var strategy_left = 0;
            var str_sum;
            var kpis_target = [];




            $("#show-kpis-dropdown").empty();

            for (var d_kpis_length = 0; d_kpis_length < d_kpis.length; d_kpis_length++)
            {
                $("#show-kpis-dropdown").append(
                    "<a class='dropdown-item kpi-dashboard' href='#' data='"+d_kpis[d_kpis_length].id+"'>" + d_kpis[d_kpis_length].name+"</a>"
                );
            }

            // strategy Dashboard
            google.charts.load('current', {'packages': ['corechart'], 'callback': strategyDrawCharts});
            function strategyDrawCharts(){
                strategyBarDrawChart();
                strategyLineDrawChart();
                strategyPieDrawChart();
            }
            google.charts.load('current', {'packages':['table']});
            google.charts.setOnLoadCallback(strategyKpisFormatDrawChart);
            google.charts.setOnLoadCallback(strategyFormatDrawChart);

            function strategyKpisFormatDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'KPI Name');
                data.addColumn('number', 'Target');

                for (var d_kpis_length = 0; d_kpis_length < d_kpis.length; d_kpis_length++)
                {
                    var per = parseInt(100 - parseInt(d_kpis_per[d_kpis_length]));
                    strategy_left += per;
                    if(per >0)
                    {

                        data.addRows([
                            [d_kpis[d_kpis_length].name, {v:-per, f: '+'+per+'%'}],

                        ]);
                    }
                    else
                    {
                        data.addRows([
                            [d_kpis[d_kpis_length].name, {v:per, f: '+'+per+'%'}],

                        ]);
                    }
                }

                var table = new google.visualization.Table(document.getElementById('strategy-kpis-arrow-format-div'));
                var formatter = new google.visualization.ArrowFormat();
                formatter.format(data, 1);
                table.draw(data, {allowHtml: true, showRowNumber: true});
            }
            function strategyFormatDrawChart() {

                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Strategy Name');
                data.addColumn('number', 'Target');

                strategy_target = parseInt(d_kpis.length) * 100;
                if (strategy_left != 0)
                {
                    var strategy_per = parseInt((parseInt(strategy_left) / parseInt(strategy_target)) * 100);
                }
                else {
                    strategy_per = 0;
                }
                if (strategy_per > 0)
                {
                    data.addRows([
                        [response[5].name, {v:-strategy_per, f: '-'+strategy_per+'%'}],
                    ]);
                }
                else
                {
                    data.addRows([
                        [response[5].name, {v:strategy_per, f: '+'+strategy_per+'%'}],
                    ]);
                }

                var table = new google.visualization.Table(document.getElementById('strategy-arrow-format-div'));
                var formatter = new google.visualization.ArrowFormat();
                formatter.format(data, 1);
                table.draw(data, {allowHtml: true, showRowNumber: true});
            }
            var st_sum = 0;
            for (var d_kpis_length = 0; d_kpis_length < d_kpis_per.length; d_kpis_length++) {
                if($.isNumeric(d_kpis_per[d_kpis_length]))
                {
                    str_sum = parseInt(d_kpis_per[d_kpis_length]);
                }
                st_sum += str_sum;
            }

            strategy_target = parseInt(d_kpis.length) * 100;

            var str_per =0;
            str_per  = parseInt((st_sum / strategy_target) *100);
            //strategy_target


            function strategyLineDrawChart() {
                var data = new google.visualization.DataTable();
                //data.addColumn('date', 'Hire Date');

                data.addColumn('string', 'KPI Name');
                data.addColumn('number', 'KPI Completed');
                data.addColumn('number', 'KPI Target');


                /*data.addRows([
                    [response[5].name , str_per],
                ]);*/
                for (var d_kpis_length = 0; d_kpis_length < d_kpis.length; d_kpis_length++)
                {
                    //console.log(d_goals);
                    //console.log(d_goals[d_kpis_length].id,d_goals[d_kpis_length].name,d_goals[d_kpis_length].target);
                    data.addRows([
                        [d_kpis[d_kpis_length].name , response[7][d_kpis_length], response[6][d_kpis_length]],
                    ]);
                }



                var options = {
                    title: 'Company Performance',
                    //width:1000,
                    height:300,
                    curveType: 'function',
                    pointSize: 20,
                    vAxis: {
                        title: 'Target Achieve',
                        baseline: 0,
                        viewWindowMode: "explicit",
                        viewWindow:{ min: 0 },
                        titleTextStyle: {
                            color: '#3385ff',
                            fontSize:"15"
                        }

                    },
                    colors: ['#3385ff','#001f4d'],
                    hAxis: {
                        baseline: 0,
                        viewWindowMode: "explicit",

                    },
                    legend: { position: 'bottom' },

                    series: {0: {type: 'line', targetAxisIndex:0},
                        1: {type: 'line', targetAxisIndex:0}
                    },
                    chartArea: {top:5,right:0, bottom:50,width:'90%',height:'80%'},
                };


                var chart = new google.visualization.LineChart(document.getElementById('d_strategy_curve_chart'));

                chart.draw(data, options);
            } //End KPI Line Chart

            // Start Pie Chart

            function strategyPieDrawChart() {
                var data = new google.visualization.DataTable();

                data.addColumn('string', 'KPI Name');
                data.addColumn('number', 'KPI Completed');
                data.addRows(3);
                for (var d_kpis_length = 0; d_kpis_length < d_kpis.length; d_kpis_length++)
                {
                    for (var k =0; k<2; k++)
                    {
                        var goal_name = d_kpis[d_kpis_length].name;
                        if (k == 0)
                            data.setCell(d_kpis_length, k, goal_name);
                        else
                            data.setCell(d_kpis_length, k, d_kpis_per[d_kpis_length]);
                    }
                }
                var optionsPie = {
                    title: 'My Daily Activities',
                    is3D: true,
                    //width:1100,
                    height:274,
                    colors: ['#3385ff','#001f4d'],
                    chartArea: {top:5,right:0,width:'90%',height:'80%'},
                    legend: { position: 'bottom' },
                };


                var chartPie = new google.visualization.PieChart(document.getElementById('d_strategy_pie_chart'));
                chartPie.draw(data, optionsPie);

            } // End KPI Pie Chart

            function strategyBarDrawChart() {
                var data = new google.visualization.DataTable();

                data.addColumn('string', 'KPI Name');
                data.addColumn('number', 'KPI Completed');
                data.addColumn('number', 'KPI Target');
                //data.addColumn('number', 'Left');
                for (var d_kpis_length = 0; d_kpis_length < d_kpis.length; d_kpis_length++)
                {
                    data.addRows([
                        [d_kpis[d_kpis_length].name , response[7][d_kpis_length], response[6][d_kpis_length]],
                    ]);
                }

                var barOptions = {
                    legend: { position: 'bottom' },
                    //width:1000,
                    height:300,
                    chart: {
                        title: 'Goal Performance',
                        //subtitle: 'Based on most recent and previous census data'
                    },
                    colors: ['#3385ff','#001f4d'],
                    hAxis: {
                        // title: 'Goal Achieved'
                    },
                    vAxis: {
                        title: 'Target Achieve',
                        titleTextStyle: {
                            color: '#3385ff',
                            fontSize:"15"
                        }
                    },
                    bars: 'vertical',
                    chartArea: {top:5,right:0, left: 50, width:'90%',height:'80%'},
                };

                var barChart = new google.visualization.ColumnChart(document.getElementById('d_strategy_bar_chart'));
                barChart.draw(data, barOptions);
                //$('#strategy_bar_dash_chart').show();

            }   // End strategy Bar cHART
        }
    });
});


// KPI Dashboard (Zeeshan)
function showKpiCharts()
{
    $('.show-strategy-chart').hide();
    $('.show-kpi-chart').show();
    $('.show-goal-chart').hide();
}

$('#kpi_pie_dash_chart').hide();
$('#kpi_line_chart').hide();
$('#kpi_bar_dash_chart').hide();
$(document).on("click", ".kpi-line-chart", function (e) {
    e.preventDefault();
    showKpiLineChart();
});
$(document).on("click", ".kpi-pie-chart", function (e) {
    e.preventDefault();
    showKpiPieChart();
});

$(document).on("click", ".kpi-bar-chart", function (e) {
    e.preventDefault();
    showKpiBarChart();
});

$(document).on("click", ".kpi-dashboard", function (e) {
    e.preventDefault();
    var kpi_id = $(this).attr('data');
    $.ajax({

        url: "show-kpi-dashboard",
        type: "get",
        data:
            {
                kpi_id : kpi_id,
            },
            success:function (response) {
                showKpiCharts();
                var d_goals_name = response[0];
                var d_goals_percentage = response[1];
                var kpi_target = 0;
                var kpi_left = 0;
                $("#show-goals-dropdown").empty();

                for (var d_goal_length = 0; d_goal_length < d_goals_name.length; d_goal_length++)
                {
                    $("#show-goals-dropdown").append(
                        "<a class='dropdown-item goal-dashboard' href='#' data='"+d_goals_name[d_goal_length].id+"'>" + d_goals_name[d_goal_length].name+"</a>"
                    );
                }
                google.charts.load('current', {'packages': ['corechart'], 'callback': drawCharts});
                function drawCharts(){
                    kpiBarDrawChart();
                    kpiLineDrawChart();
                    kpiPieDrawChart();
                    // kpiAreaDrawChart();

                }

                function kpiLineDrawChart() {
                    var data = new google.visualization.DataTable();
                    //data.addColumn('date', 'Hire Date');

                    data.addColumn('string', 'Goal Name');
                    data.addColumn('number', 'Target Achieved');
                    data.addColumn('number', 'Target');

                    var g_name = "No Goal";
                    var per =0;
                    if (d_goals_name.length != 0)
                    {
                        for (d_goal_length = 0; d_goal_length < d_goals_name.length; d_goal_length++)
                        {
                            if ($.isNumeric(d_goals_percentage[d_goal_length]))
                            {
                                per = d_goals_percentage[d_goal_length];
                                g_name = d_goals_name[d_goal_length].name;
                                data.addRows([
                                    [g_name , response[2][d_goal_length] , response[1][d_goal_length]],
                                ]);
                            }
                        }

                    }

                    var options = {
                        // width:690,
                        height:274,
                        pointSize: 5,
                        curveType: 'function',
                        legend: { position: 'bottom' },
                        chartArea: {top:10,right:0,width:'90%',height:'80%'},
                        hAxis: {
                            // title: 'Goal',
                            viewWindowMode: 'pretty',
                            // showTextEvery: 4,
                        },
                        vAxis: {
                            title: 'Target Achieved',
                            titleTextStyle: {
                                color: '#3385ff',
                                fontSize:"15"
                            }
                        },

                        colors: ['#3385ff','#001f4d']
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('kpi_curve_chart'));
                    chart.draw(data, options);
                } //End KPI Line Chart

                // Start Pie Chart

                function kpiPieDrawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Goal Name');
                    data.addColumn('number', 'Goal Achieved');
                    for (d_goal_length = 0; d_goal_length < d_goals_name.length ; d_goal_length++)
                    {
                        if (response[2][d_goal_length] != 0)
                        {
                            data.addRows([
                                [response[0][d_goal_length].name ,response[2][d_goal_length] ],
                            ]);
                        }
                        else
                        {
                            data.addRows([
                                [response[0][d_goal_length].name ,0.1],
                            ]);
                        }
                    }

                    var optionsPie = {
                        chartArea: {top:10,right:0,width:'90%',height:'90%'},
                        is3D: true,
                        height:300,
                        colors:['#3385ff','001f4d',"red"],
                        legend:{textStyle:{color:"black",fontSize:"15"}},
                    };

                    var chartPie = new google.visualization.PieChart(document.getElementById('kpi_pie_chart'));
                    chartPie.draw(data, optionsPie);
                } // End KPI Pie Chart

                function kpiBarDrawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Goal Name');
                    data.addColumn('number', 'Goal Target');
                    data.addColumn('number', 'Goal Achieved');
                    for (d_goal_length = 0; d_goal_length < d_goals_name.length; d_goal_length++)
                    {
                        data.addRows([
                            [d_goals_name[d_goal_length].name ,response[1][d_goal_length], response[2][d_goal_length]],
                        ]);
                    }
                    var barOptions = {
                        height:300,
                        chartArea: {top:10,right:0,width:'80%',height:'75%'},
                        // backgroundColor:"#f2f2f2",
                        legend: { position: 'bottom'},
                        hAxis: {
                            // title: 'Goal Name',
                            // showTextEvery: 4,
                        },
                        vAxis: {
                            title:"Target Achieved",
                            titleTextStyle: {
                                color: '#3385ff',
                                fontSize:"15"
                            }
                        },
                        colors: ['#3385ff','#001f4d']
                    };
                    var barChart = new google.visualization.ColumnChart(document.getElementById('kpi_bar_chart'));
                    barChart.draw(data, barOptions);

                }   // End KPI Bar cHART

                // function kpiAreaDrawChart() {
                //     var data = new google.visualization.DataTable();
                //     data.addColumn('string', 'Goal Name');
                //     data.addColumn('number', 'Goal Completed');
                //     //data.addColumn('number', 'Left');
                //     for (d_goal_length = 0; d_goal_length < d_goals_name.length; d_goal_length++)
                //     {
                //         data.addRows([
                //             [d_goals_name[d_goal_length].name , d_goals_percentage[d_goal_length]],
                //         ]);
                //     }
                //
                //     var barOptions = {
                //         legend: { position: 'bottom' },
                //         // width:1000,
                //         // height:480,
                //         chart: {
                //             title: 'Goal Performance',
                //             //subtitle: 'Based on most recent and previous census data'
                //         },
                //         colors: ['#1b9e77', '#d95f02', '#7570b3'],
                //         hAxis: {
                //             title: 'Goal Achieved'
                //         },
                //         vAxis: {
                //             title: 'Working Duration'
                //         },
                //         bars: 'vertical',
                //
                //
                //     };
                //     var barChart = new google.visualization.AreaChart(document.getElementById('kpi_area_chart'));
                //     barChart.draw(data, barOptions);
                //     //$('#kpi_bar_dash_chart').show();
                //
                // }   // End KPI Bar cHART

        }
    });
});

//Goal Dashboard
function showGoalCharts()
{
    $('.show-strategy-chart').hide();
    $('.show-kpi-chart').hide();
    $('.show-goal-chart').show();
}

$('#goal_pie_dash_chart').hide();
$('#goal_line_chart').hide();
$('#goal_bar_dash_chart').hide();
$(document).on("click", ".line-chart", function (e) {
    e.preventDefault();
    showGoalLineChart();
});
$(document).on("click", ".pie-chart", function (e) {
    e.preventDefault();
    showGoalPieChart();
});

$(document).on("click", ".bar-chart", function (e) {
    e.preventDefault();
    showGoalBarChart();
});

$(document).on("click", ".goal-dashboard", function (e) {
    e.preventDefault();
    var goal_id = $(this).attr('data');
    $.ajax({

        url: "show-goal-dashboard",
        type: "get",
        data:
            {
                goal_id : goal_id,
            },
        success:function (response) {

            showGoalCharts();

            var goal = response[0];

            $('.d-goal-name').html(goal.name);

            var goal_target = parseInt(goal.target);
            var goaldatas = response[1];

            google.charts.load('current', {'packages': ['corechart'], 'callback': goalDrawCharts});
            function goalDrawCharts(){
                goalBarDrawChart();
                goalLineDrawChart();
                goalPieDrawChart();
            }

            //console.log(response);

            var data_dates = [];
            var actual_data = [];
            var left_actual_data = [];
            var total_actual_data = 0;
            var total_left_data = parseInt(goal.target) * parseInt(goaldatas.length);

            var total_goal_target = total_left_data;

            // console.log(total_left_data);
            for (var y =0; y < goaldatas.length; y++)
            {
                //console.log(goaldatas[y]);
                data_dates[y] = goaldatas[y].data_entry_date;
                if(data_dates[y] != '')
                data_dates[y] = data_dates[y].slice(0,10);

                actual_data[y] = goaldatas[y].actual_data;
                if ($.isNumeric(actual_data[y]))
                {
                    left_actual_data[y] = parseInt(goal_target) - parseInt(actual_data[y]);
                    if (actual_data[y] != 0)
                    {
                        total_actual_data += parseInt(actual_data[y]);
                    }
                }
            }


            total_left_data -= parseInt(total_actual_data);

            // google.charts.load('current', {'packages':['table']});
            // google.charts.setOnLoadCallback(goalFormatDrawChart);

            // function goalFormatDrawChart() {
            //     var data = new google.visualization.DataTable();
            //     data.addColumn('string', 'Goal Name');
            //     data.addColumn('number', 'Target Left');
            //
            //     var goal_per = (parseInt(total_actual_data) / parseInt(total_goal_target)) * 100;
            //
            //         if(goal_per >0)
            //         {
            //
            //             data.addRows([
            //                 [goal.name, {v:-goal_per, f: '-'+goal_per}],
            //
            //             ]);
            //         }
            //         else
            //         {
            //             data.addRows([
            //                 [goal.name, {v:goal_per, f: ''+goal_per}],
            //
            //             ]);
            //         }
            //
            //
            //     var table = new google.visualization.Table(document.getElementById('goal-arrow-format-div'));
            //     var formatter = new google.visualization.ArrowFormat();
            //     formatter.format(data, 1);
            //     table.draw(data, {allowHtml: true, showRowNumber: true});
            // }


            function goalLineDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Date');
                data.addColumn('number', 'Actual');
                data.addColumn('number', 'Target');
                for (z = 0; z < goaldatas.length; z++)
                {
                    data.addRows([
                        [data_dates[z] , actual_data[z], goal_target],
                    ]);
                }

                var options = {
                    // width:690,
                    height:274,
                    pointSize: 5,
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    chartArea: {top:10,right:0,width:'90%',height:'80%'},
                    // backgroundColor:"#f2f2f2",
                    hAxis: {
                        title: 'Work Done On',
                        viewWindowMode: 'pretty',
                        showTextEvery: 4,
                    },
                    vAxis: {
                        title: 'Target Achieved',
                    },

                    colors: ['#3385ff','#001f4d']
                };
                var chart = new google.visualization.LineChart(document.getElementById('d_goal_curve_chart'));
                chart.draw(data, options);
            }

            // Start Pie Chart

            // google.charts.load("current", {packages:["corechart"]});

            function goalPieDrawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Goal Completed', total_actual_data],
                    ['Goal Not Complated', total_left_data],
                ]);

                var optionsPie = {
                    title: 'Goal Performance Pie Chart',
                    chartArea: {top:10,right:0,width:'90%',height:'80%'},
                    is3D: true,
                    //width:1100,
                    height:300,
                    legend: { position: 'bottom'},
                };

                var chartPie = new google.visualization.PieChart(document.getElementById('d_goal_pie_chart'));
                chartPie.draw(data, optionsPie);
               // $('#goal_pie_dash_chart').show();
            }

            // Start Bar Chart

            // google.charts.load("current", {packages:["corechart"]});

            function goalBarDrawChart() {
                var data = new google.visualization.DataTable();

                data.addColumn('string', 'Date');
                data.addColumn('number', 'Actual');
                data.addColumn('number', 'Target');
                for (z = 0; z<goaldatas.length; z++)
                {
                    data.addRows([
                        [data_dates[z] , actual_data[z], goal_target],
                    ]);
                }

                var barOptions = {
                    //width:1200,
                    height:500,
                    legend: { position: 'bottom'},
                    chartArea: {top:10,right:0,width:'90%',height:'80%'},
                    chart: {
                        title: 'Goal Performance',
                        //subtitle: 'Based on most recent and previous census data'
                    },
                    hAxis: {
                        title: 'Goal Achieved',
                        viewWindowMode: 'pretty', slantedText: true,
                        showTextEvery: 3,
                    },
                    vAxis: {
                        title: 'Working Duration',
                        gridlines: { count: 4 }
                    },
                    bars: 'vertical',

                    //bar: {groupWidth: "70%"},
                    colors: ['#3385ff','#001f4d']

                };
                var barChart = new google.visualization.ColumnChart(document.getElementById('d_goal_bar_chart'));
                barChart.draw(data, barOptions);
                //$('#goal_bar_dash_chart').show();

            }

        }
    });
});

























































































// goal data dashboard
$(document).on("click", ".goalData-dashboard", function (e) {
    e.preventDefault();
    var goal_id = $(this).attr('data');
    $.ajax({
        url: "show-goalData-dashboard",
        type: "get",
        data:
            {
                goal_id : goal_id,
            },
        success:function (response) {
            // console.log(response);
            var goal = response[0];
            var goal_target = parseInt(goal.target);
            var goaldatas = response[1];
            // console.log(goaldatas);
            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages': ['corechart']});

            //console.log("Total Target : "+ goal_target);
            google.charts.setOnLoadCallback(barDrawChart);
            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(lineDrawChart);
            google.charts.setOnLoadCallback(pieDrawChart);
            google.charts.setOnLoadCallback(areaDrawChart);

            var data_dates = [];
            var actual_data = [];
            var left_actual_data = [];
            var total_actual_data = 0;
            var total_left_data = parseInt(goal.target) * parseInt(goaldatas.length);

            //console.log(total_left_data);

            // console.log(total_left_data);
            for (var y =0; y < goaldatas.length; y++)
            {
                data_dates[y] = goaldatas[y].data_entry_date.slice(0,10);

                actual_data[y] = goaldatas[y].actual_data;
                if ($.isNumeric(actual_data[y]))
                {
                    left_actual_data[y] = parseInt(goal_target) - parseInt(actual_data[y]);
                    if (actual_data[y] != 0)
                    {
                        total_actual_data += parseInt(actual_data[y]);
                    }
                }
            }

            total_left_data -= parseInt(total_actual_data);

            function lineDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Date');
                data.addColumn('number', 'Actual');
                data.addColumn('number', 'Target');
                for (z = 0; z < goaldatas.length; z++)
                {
                    data.addRows([
                        [data_dates[z] , actual_data[z], goal_target],
                    ]);
                }

                var options = {
                    // width:690,
                    height:274,
                    pointSize: 5,
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    chartArea: {top:10,right:0,width:'90%',height:'80%'},
                    // backgroundColor:"#f2f2f2",
                    hAxis: {
                        title: 'Work Done On',
                        viewWindowMode: 'pretty',
                        showTextEvery: 4,
                    },
                    vAxis: {
                        title: 'Target Achieved',
                    },

                    colors: ['#3385ff','#001f4d']
                };
                var chart = new google.visualization.LineChart(document.getElementById('goal_data_curve_chart'));
                chart.draw(data, options);
                $('#goal_line_chart').show();
            }

            // Start Pie Chart

            // google.charts.load("current", {packages:["corechart"]});

            function pieDrawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['Approved',  response["2"]],
                    ['Rejected', response["3"]],
                    ['Pending',    response["4"]],
                ]);

                var optionsPie = {
                    title: 'Goal Achieved',
                    chartArea: {top:10,right:0,width:'90%',height:'90%'},
                    is3D: true,
                    height:300,
                    // backgroundColor:"#f2f2f2",
                    colors:['#3385ff','red',"#001f4d"],
                    legend:{textStyle:{color:"black",fontSize:"15"}},
                };

                var chartPie = new google.visualization.PieChart(document.getElementById('goal_data_pie_chart'));
                chartPie.draw(data, optionsPie);
            }

            // Start Bar Chart

            // google.charts.load("current", {packages:["corechart"]});

            function barDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Date');
                data.addColumn('number', 'Actual');
                data.addColumn('number', 'Target');
                for (z = 0; z<goaldatas.length; z++)
                {
                    data.addRows([
                        [data_dates[z] , actual_data[z], goal_target],
                    ]);
                }

                var barOptions = {
                    height:300,
                    chartArea: {top:10,right:0,width:'80%',height:'75%'},
                    // backgroundColor:"#f2f2f2",
                    legend: { position: 'bottom'},
                    hAxis: {
                        title: 'Working Dates',
                        showTextEvery: 4,
                    },
                    vAxis: {
                        title: 'Target Accomplished',
                    },
                    colors: ['#3385ff','#001f4d']
                };
                var barChart = new google.visualization.ColumnChart(document.getElementById('goal_data_bar_chart'));
                barChart.draw(data, barOptions);
            }

            // Start Area Chart

            // google.charts.load("current", {packages:["corechart"]});
            function areaDrawChart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Date');
                data.addColumn('number', 'Actual');
                data.addColumn('number', 'Target');
                for (z = 0; z<goaldatas.length; z++)
                {
                    data.addRows([
                        [data_dates[z] , actual_data[z], goal_target],
                    ]);
                }
                var options = {
                    legend: { position: 'bottom'},
                    pointSize: 5,
                    colors: ['#3385ff','#001f4d'],
                    height:300,
                    chartArea: {top:10,right:0,width:'90%',height:'75%'},
                    hAxis: {title: 'Working Dates',  titleTextStyle: {color: 'black'}, showTextEvery: 4},
                    vAxis: {title: 'Target Achieved', titleTextStyle: {color: "black"}}
                };
                var chart = new google.visualization.AreaChart(document.getElementById('goal_data_area_chart'));
                chart.draw(data, options);
            }
        }
    });
});

$(document).ready(function () {
    var pathname = window.location.pathname; // Returns path only



    if (pathname == "/vision-dashboard")
    {
        $(".vision-dashboard")[0].click();

    }
    else if (pathname == "/strategy-dashboard")
    {
        $(".strategy-dashboard")[0].click();

    }
    else if (pathname == "/kpi-dashboard")
    {
        $(".kpi-dashboard")[0].click();

    }
    else if (pathname == "/goal-dashboard")
    {
        $(".goal-dashboard")[0].click();

    }
    else if (pathname == "/goal-data-dashboard")
    {
        $(".goalData-dashboard")[0].click();

    }

});

$(document).on("submit", "#searchGoalDataPerformanceByDate", function (e) {
    e.preventDefault();
    var date = $("#searchGoalDataPerformance").val();
    $.ajax({
        url: "gd-data-performance",
        type: "get",
        data:
            {
                date : date,
            },
        success:function (response) {
            if(response[0] == "")
            {
                swal("Warning","No Data Found for "+date,"warning");
            }
            else {
                // var goal = response[0];
                // var goal_target = parseInt(goal.target);
                var goaldatas = response[0];
                // console.log(goaldatas);
                // Load the Visualization API and the corechart package.
                google.charts.load('current', {'packages': ['corechart']});

                //console.log("Total Target : "+ goal_target);
                google.charts.setOnLoadCallback(barDrawChart);
                // Set a callback to run when the Google Visualization API is loaded.
                google.charts.setOnLoadCallback(lineDrawChart);
                google.charts.setOnLoadCallback(pieDrawChart);
                google.charts.setOnLoadCallback(areaDrawChart);

                var data_dates = [];
                var actual_data = [];
                var left_actual_data = [];
                var total_actual_data = 0;
                // var total_left_data = parseInt(goal.target) * parseInt(goaldatas.length);

                //console.log(total_left_data);

                // console.log(total_left_data);
                for (var y = 0; y < goaldatas.length; y++) {
                    data_dates[y] = goaldatas[y].data_entry_date.slice(0, 10);

                    actual_data[y] = goaldatas[y].actual_data;
                    if ($.isNumeric(actual_data[y])) {
                        // left_actual_data[y] = parseInt(goal_target) - parseInt(actual_data[y]);
                        if (actual_data[y] != 0) {
                            total_actual_data += parseInt(actual_data[y]);
                        }
                    }
                }

                // total_left_data -= parseInt(total_actual_data);

                function lineDrawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Date');
                    data.addColumn('number', 'Actual');
                    // data.addColumn('number', 'Target');
                    for (z = 0; z < goaldatas.length; z++) {
                        data.addRows([
                            [data_dates[z], actual_data[z]],
                        ]);
                    }

                    var options = {
                        // width:690,
                        height: 274,
                        pointSize: 5,
                        curveType: 'function',
                        legend: {position: 'bottom'},
                        chartArea: {top: 10, right: 0, width: '90%', height: '80%'},
                        // backgroundColor:"#f2f2f2",
                        hAxis: {
                            title: 'Work Done On',
                            viewWindowMode: 'pretty',
                            showTextEvery: 4,
                        },
                        vAxis: {
                            title: 'Target Achieved',
                        },

                        colors: ['#3385ff', '#001f4d']
                    };
                    var chart = new google.visualization.LineChart(document.getElementById('goal_data_curve_chart'));
                    chart.draw(data, options);
                    $('#goal_line_chart').show();
                }

                // Start Pie Chart

                // google.charts.load("current", {packages:["corechart"]});

                function pieDrawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Task', 'Hours per Day'],
                        ['Approved', response["1"]],
                        ['Rejected', response["2"]],
                        ['Pending', response["3"]],
                    ]);

                    var optionsPie = {
                        title: 'Goal Achieved',
                        chartArea: {top: 10, right: 0, width: '90%', height: '90%'},
                        is3D: true,
                        height: 300,
                        // backgroundColor:"#f2f2f2",
                        colors: ['#3385ff', 'red', "#001f4d"],
                        legend: {textStyle: {color: "black", fontSize: "15"}},
                    };


                    var chartPie = new google.visualization.PieChart(document.getElementById('goal_data_pie_chart'));
                    chartPie.draw(data, optionsPie);
                }

                // Start Bar Chart

                // google.charts.load("current", {packages:["corechart"]});

                function barDrawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Date');
                    data.addColumn('number', 'Actual');
                    // data.addColumn('number', 'Target');
                    for (z = 0; z < goaldatas.length; z++) {
                        data.addRows([
                            [data_dates[z], actual_data[z]],
                        ]);
                    }

                    var barOptions = {
                        height: 300,
                        chartArea: {top: 10, right: 0, width: '80%', height: '75%'},
                        // backgroundColor:"#f2f2f2",
                        legend: {position: 'bottom'},
                        hAxis: {
                            title: 'Working Dates',
                            showTextEvery: 4,
                        },
                        vAxis: {
                            title: 'Target Accomplished',
                        },
                        colors: ['#3385ff', '#001f4d']
                    };
                    var barChart = new google.visualization.ColumnChart(document.getElementById('goal_data_bar_chart'));
                    barChart.draw(data, barOptions);
                }

                // Start Area Chart

                // google.charts.load("current", {packages:["corechart"]});
                function areaDrawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Date');
                    data.addColumn('number', 'Actual');
                    // data.addColumn('number', 'Target');
                    for (z = 0; z < goaldatas.length; z++) {
                        data.addRows([
                            [data_dates[z], actual_data[z]],
                        ]);
                    }
                    var options = {
                        legend: {position: 'bottom'},
                        pointSize: 5,
                        colors: ['#3385ff', '#001f4d'],
                        height: 300,
                        chartArea: {top: 10, right: 0, width: '90%', height: '75%'},
                        hAxis: {title: 'Working Dates', titleTextStyle: {color: 'black'}, showTextEvery: 4},
                        vAxis: {title: 'Target Achieved', titleTextStyle: {color: "black"}}
                    };
                    var chart = new google.visualization.AreaChart(document.getElementById('goal_data_area_chart'));
                    chart.draw(data, options);
                }
            }
        }
    });
});


