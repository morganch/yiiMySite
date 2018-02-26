{% extends "@app/views/based.twig" %}

{% block main %}
<div class="panel-body">
    <div id="jqxWidget">
        <div id="jqxgrid"></div>
    </div>
</div>

{% endblock %}
{% block script_end %}

<script type="text/javascript">
     $(document).ready(function () {
        alert('using jQuery!');
        var theme = 'energyblue';
        var source =
                {
                    datatype: "json",
                    datafields: [
                        {name: 'F_NAME', type: 'string'},
                        {name: 'F_TYPE', type: 'string'},
                        {name: 'REF_F_ID', type: 'string'},                        
                        {name: 'RECOM_FLAG', type: 'string'},
                        {name: 'PRINT_FLAG', type: 'string'},
                        {name: 'STATUS', type: 'string'},
                        {name: 'FIRM_ID', type: 'string'}
                    ],
                    cache: false,
                    url: "{{ path('@web/firm-info/griddata-service/') }}",
                    root: 'Rows',
                    beforeprocessing: function (data) {
                        if (data[0]) {
                            source.totalrecords = data[0].TotalRows;
                        }
                    }
                };
        var dataAdapter = new $.jqx.dataAdapter(source, {formatData: function (data) {
                data.searchField = 'F_NAME';
                data.searchString = $("#searchterm").val();
                return data;
            }});
        var status;

        var andlinkrenderer = function (row, column, value) {
            status = value;
        };

        //功能列功能一覽
        var linkrenderer = function (row, column, value) {

            var html = '<div class="btncss juiker-jqxGrid-toolbar">';
            //alert(row+'||'+column+'||'+value);            
            var editurl = '{{ path('@web/firm-info/update') }}' + '?FIRM_ID=' + value;
            html = html + "<a href='" + editurl + "'><span class='glyphicon glyphicon-edit' data-toggle='tooltip' title='<?= Yii::t('app', '編輯') ?>'><span></a>";
            html = html + "</div>";
            return html;
        };      
                
        var columnsrenderer = function (value) {
            return '<div class="juiker-jqGrid-header">' + value + '</div>';
        };
        

        var selectText = function (element) {
            var doc = element.ownerDocument, selection, range;
            if (doc.body.createTextRange) { // ms
                range = doc.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                if (selection.setBaseAndExtent) { // webkit
                    selection.setBaseAndExtent(element, 0, element, 1);
                } else { // moz, opera
                    range = doc.createRange();
                    range.selectNodeContents(element);
                    selection.removeAllRanges();
                    selection.addRange(range);
                }
            }
        };
        // prepare jqxChart settings

        // initialize jqxGrid
        $("#jqxgrid").jqxGrid(
                {
                    width: "100%",
                    source: dataAdapter,
                    theme: theme,
                    autoheight: true,
                    //columnsresize: true,
                    altrows: true,
                    pageable: true,
                    sortable: true,
                    autorowheight: true,
                    enablebrowserselection: true,
                    localization: getLocalization(),
                    showtoolbar: true,
                    rendertoolbar: function (toolbar) {
                        var me = this;
                        var container = $("<div style='margin: 5px;'></div>");
                        var span = $("<span style='float: left; margin-top: 5px; margin-right: 4px;'>企業名稱： </span>");
                        var input = $("<input class='jqx-input jqx-widget-content jqx-rc-all' id='searchterm' type='text' style='height: 23px; float: left; width: 223px;' />");
                        toolbar.append(container);
                        container.append(span);
                        container.append(input);
                        if (theme !== "") {
                            input.addClass('jqx-widget-content-' + theme);
                            input.addClass('jqx-rc-all-' + theme);
                        }
                        input.bind('keydown', function (event) {
                            if (input.val().length >= 1) {
                                if (me.timer)
                                    clearTimeout(me.timer);
                                me.timer = setTimeout(function () {
                                    dataAdapter.dataBind();
                                }, 300);
                            }
                        });
                        $('[data-toggle="tooltip"]').tooltip();
                    },
                    columns: [
                        {text: '{{t('app', '企業名稱') }}', columntype: 'textbox', width: '25%', datafield: 'F_NAME',renderer: columnsrenderer},                       
                        {text: '{{t('app', '群首企業') }}>', columntype: 'textbox', width: '25%', datafield: 'REF_F_ID',renderer: columnsrenderer},
                        {text: '{{t('app', '申請類型') }}>', columntype: 'textbox', width: '14%', datafield: 'F_TYPE',renderer: columnsrenderer},            
                        {text: '{{t('app', '可推薦') }}>', columntype: 'textbox', width: '8%', datafield: 'RECOM_FLAG',renderer: columnsrenderer},            
                        {text: '{{t('app', '允許列印') }}>', columntype: 'textbox', width: '8%', datafield: 'PRINT_FLAG',renderer: columnsrenderer},
                        {text: '{{t('app', '啟用MVPN') }}>', columntype: 'textbox', width: '10%', datafield: 'STATUS',renderer: columnsrenderer},
                        {text: '{{t('app', '操作選項') }}>', datafield: 'FIRM_ID', width: '10%', cellsrenderer: linkrenderer,renderer: columnsrenderer}
                    ] 

                });
    });
    
</script>



{% endblock %}

