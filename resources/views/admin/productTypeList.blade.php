@extends('layouts.admin')
@section('headLink')
<link rel="stylesheet" href="{{url('/jqwidgets-ver4.5.0/jqwidgets/styles/jqx.base.css')}}" type="text/css" />
@endsection
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{url('admin')}}">Home</a></li>
        <li><a href="{{url('admin/productType')}}">广告合作</a></li>
        <li class="active">列表</li>
    </ol>

    <div class="block">
        <form style="margin-top: 2rem;" class="form-horizontal" action="">

            <div class="form-group">
                <label for="title" class="col-sm-1 control-label">类别标题</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="title" id="title" value="" placeholder="类别标题">
                </div>
                <label for="parent_id" class="col-sm-1 control-label">上级分类</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="parent_id" id="parent_id" value="0" placeholder="上级分类">
                </div>
                <label for="levels" class="col-sm-1 control-label">层级</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="levels" id="levels" value="1" placeholder="层级">
                </div>
            </div>
            <div class="form-group">
                <label for="detail" class="col-sm-1 control-label">描述</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" name="detail" id="detail" value="" placeholder="描述">
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="button" class="btn btn-primary submit-btn" value="保存">
                </div>
            </div>
        </form>

    </div>

    <div class="well">
        <div id="treeGrid"></div>
    </div>

@endsection

@section('bodyScript')
    <script>
        $(function() {
            jqwidgets();
            $(document).on('click','.glyphicon-trash',function () {
                var id = $(this).attr('data-title');
                if(confirm('你确定要删除吗?')){
                    $.post("{{url('admin/productType')}}/"+id, { "_method": "DELETE","_token": "{{ csrf_token() }}"},
                        function(data){
                            window.location.reload(true);
                        }, "json");
                }
            });


            $(document).on('click','.submit-btn',function () {
                var title = $("#title").val();
                var parent_id = $("#parent_id").val();
                var levels = $("#levels").val();
                var detail = $("#detail").val();
                if(confirm('你确定要添加吗?')){
                    $.post("{{url('admin/productType')}}", {"_token": "{{ csrf_token() }}","title":title,"parent_id":parent_id,"levels":levels,"detail":detail,"status":1},
                        function(data){
                            jqwidgets();
                        }, "json");
                }
            });
        });


    </script>



    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxcore.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxbuttons.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxscrollbar.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxdatatable.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxtreegrid.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxlistbox.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxdropdownlist.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxdata.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxtooltip.js')}}"></script>
    <script type="text/javascript" src="{{url('/jqwidgets-ver4.5.0/jqwidgets/jqxinput.js')}}"></script>
    <script type="text/javascript">
        function jqwidgets(){
            var that = this;
            $(document).ready(function () {
                var source =
                    {
                        dataType: "json",
                        dataFields: [
                            { name: "title", type: "string" },
                            { name: "parent_id", type: "number" },
                            { name: "levels", type: "number" },
                            { name: "pk_id", type: "number" },
                            { name: "detail", type: "string" }
                        ],
                        hierarchy:
                            {
                                keyDataField: { name: 'pk_id' },
                                parentDataField: { name: 'parent_id' }
                            },
                        // localData: data,
                        id: "pk_id",
                        url:"{{url('admin/productType')}}"
                    };
                var dataAdapter = new $.jqx.dataAdapter(source, {
                    loadComplete: function () {
                    }
                });
                this.editrow = -1;

                $("#treeGrid").jqxTreeGrid(
                    {
                        width: '100%',
                        source: dataAdapter,
                        altRows: true,
                        autoRowHeight: false,
                        ready: function()
                        {
                            // Expand rows with ID = 1, 2 and 7
                            $("#treeGrid").jqxTreeGrid('expandRow', 1);
                            $("#treeGrid").jqxTreeGrid('expandRow', 2);
                            $("#treeGrid").jqxTreeGrid('expandRow', 7);
                        },
                        editable: true,
                        editSettings: { saveOnPageChange: true, saveOnBlur: true, saveOnSelectionChange: false, cancelOnEsc: true, saveOnEnter: true, editOnDoubleClick: false, editOnF2: false },
                        // called when jqxTreeGrid is going to be rendered.
                        rendering: function()
                        {
                            // destroys all buttons.
                            if ($(".editButtons").length > 0) {
                                $(".editButtons").jqxButton('destroy');
                            }
                            if ($(".cancelButtons").length > 0) {
                                $(".cancelButtons").jqxButton('destroy');
                            }
                        },
                        // called when jqxTreeGrid is rendered.
                        rendered: function () {
                            if ($(".editButtons").length > 0) {
                                $(".cancelButtons").jqxButton();
                                $(".editButtons").jqxButton();

                                var editClick = function (event) {
                                    var target = $(event.target);
                                    // get button's value.
                                    var value = target.val();
                                    // get clicked row.
                                    var rowKey = event.target.getAttribute('data-row');
                                    if (value == "Edit") {
                                        // begin edit.
                                        $("#treeGrid").jqxTreeGrid('beginRowEdit', rowKey);
                                        target.parent().find('.cancelButtons').show();
                                        target.val("Save");
                                    }else {
                                        // end edit and save changes.
                                        target.parent().find('.cancelButtons').hide();
                                        target.val("Edit");
                                        $("#treeGrid").jqxTreeGrid('endRowEdit', rowKey);


                                    }
                                }
                                $(".editButtons").on('click', function (event) {
                                    editClick(event);

                                });

                                $(".cancelButtons").click(function (event) {
                                    // end edit and cancel changes.
                                    var rowKey = event.target.getAttribute('data-row');
                                    $("#treeGrid").jqxTreeGrid('endRowEdit', rowKey, true);
                                });
                            }
                        },

                        columns: [
                            { text: 'ID', editable: false, dataField: 'pk_id', width: 50 },
                            { text: '上级ID', dataField: 'parent_id', width: 100 },
                            { text: '分类标题', dataField: 'title', width: 350 },
                            { text: '层级', dataField: 'levels', width: 100 },
                            { text: '备注', dataField: 'detail', width: 350 },
                            {
                                text: 'Edit', cellsAlign: 'center', align: "center", columnType: 'none', editable: false, sortable: false, dataField: null, cellsRenderer: function (row, column, value) {
                                // render custom column.
                                return "<button data-row='" + row + "' class='editButtons'>Edit</button><button style='display: none; margin-left: 5px;' data-row='" + row + "' class='cancelButtons'>Cancel</button>";
                            }
                            }
                        ]
                    }).on('rowEndEdit',function (event){
                    // event args.
                    var args = event.args;
                    // row key.
                    var key = args.key;
                    // row data.
                    var row = args.row;
                    var pk_id = row.pk_id;
                    var title = row.title;
                    var parent_id = row.parent_id;
                    var levels = row.levels;
                    var detail = row.detail;
                    $.post("{{url('admin/productType')}}/"+pk_id, {"_method":"PUT","_token": "{{ csrf_token() }}","title":title,"parent_id":parent_id,"levels":levels,"detail":detail,"status":1},
                        function(data){
                            jqwidgets();
                        }, "json");
                });

            });
        }

    </script>
@endsection