<html>
    <head>
    	{include file="layout/head.tpl"}
    </head>
    <body>
        <div id="content" class="content" style="border: 1px dotted blue; padding: 5px; margin: 5px;">
            {include file=$file_content|default:"layout/nobody.tpl"}
        </div>
        <div id="menu" class="menu" style="border: 1px dotted red; padding: 5px; margin: 5px;">
            {include file="layout/menu.tpl"}
        </div>        
        <div id="footer" class="footer" style="border: 1px dotted green; padding: 5px; margin: 5px;">
            {include file="layout/footer.tpl"}
        </div>
    </body>
</html>