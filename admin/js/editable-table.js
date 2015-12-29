var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="hidden" id="fid_user" class=" small" value="' + aData[0] + '">';
                jqTds[1].innerHTML = '<input type="text" id="fnom_user" class=" small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '<input type="text" id="fprenom_user" class=" small" value="' + aData[2] + '">';
                jqTds[3].innerHTML = '<input type="text" id="ftel_user" class=" small" value="' + aData[3] + '">';
                jqTds[4].innerHTML = '<input type="text" id="fmail_user" class=" small" value="' + aData[4] + '">';
                //jqTds[5].innerHTML = '<input type="text" class=" small" value="' + aData[5] + '">';
                //jqTds[6].innerHTML = '<input type="text" class=" small" value="' + aData[6] + '">';
                jqTds[7].innerHTML = '<a class="edit" href=""><button class="btn btn-success"><i class="icon-check"></i></button></a> <a class="cancel" href=""><button class="btn btn-info"><i class="icon-undo"></i></button></a>';

            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
                //oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
               // oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
                oTable.fnUpdate('<a class="edit" href="javascript:;"><button class="btn btn-warning"><i class="icon-cog"></i></button></a> <a class="desactiver" href="javascript:;"><button class="btn btn-primary"><i class="icon-pause"></i></button></a><a class="delete" href="javascript:;"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>', nRow, 7, false);

                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
               // oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
                //oTable.fnUpdate(jqInputs[6].value, nRow, 6, false);
                oTable.fnUpdate('<a class="edit" href="javascript:;"><button class="btn btn-warning"><i class="icon-cog"></i></button></a> <a class="desactiver" href="javascript:;"><button class="btn btn-primary"><i class="icon-pause"></i></button></a><a class="delete" href="javascript:;"><button class="btn btn-danger"><i class="icon-trash"></i></button></a>', nRow, 7, false);
                oTable.fnDraw();
            }

            var oTable = $('#editable-sample').dataTable({
                "aLengthMenu": [
                    [5, 15, 20, -1],
                    [5, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 5,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ Utilisateurs par page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#editable-sample_wrapper .dataTables_filter input').addClass(" medium"); // modify table search input
            jQuery('#editable-sample_wrapper .dataTables_length select').addClass(" xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#editable-sample_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">Edit</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#editable-sample a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
                alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#editable-sample a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#editable-sample a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow || this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;

                    var aData = oTable.fnGetData(nRow);
                    //on récupère les variable avec l'id des champs
                    var fid_user = aData[0];
                    var fnom_user = aData[1];
                    var fprenom_user = aData[2];
                    var ftel_user = aData[3];
                    var fmail_user = aData[4];
                    //On envoi les valeur dans le fichier Modèle
                    jQuery.post("modeles/ajax.php?ajax=update_users", {
                        fid_user: fid_user,
                        fnom_user: fnom_user,
                        fprenom_user: fprenom_user,
                        ftel_user : ftel_user,
                        fmail_user : fmail_user
                    },  function(data, textStatus){
        if(data == 1){
        alert("Mise à jour effectuée ! ");
            setTimeout(function(){
                            //location.reload();
                        },0);

            }
            else {
                alert("Pas modifié !");
            }
            });


                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();
