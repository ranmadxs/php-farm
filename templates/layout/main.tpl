<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <script type="text/javascript" src="{$smarty.session.PATH_HTTP}/js/jquery-1.9.1.min.js"></script>
        <title>NET</title>
    </head>
    <body>
        <div id="menu" class="menu">
            {include file="layout/menu.tpl"}
        </div>
        <div id="content" class="content">
            {include file=$file_content|default:"layout/nobody.tpl"}
        </div>
        <div id="footer" class="footer">
            {include file="layout/footer.tpl"}
        </div>
    </body>
</html>