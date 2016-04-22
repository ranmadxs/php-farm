<html>
    <head>
        <link rel="stylesheet" href="./css/SimpleCalendar.css" />
	<link rel="stylesheet" href="./js/jquery.alerts-1.1/jquery.alerts.css" />
	<!-- jQuery -->
	<script type="text/javascript" src="./js/jquery-2.2.2.min.js"></script>
	<script type="text/javascript" src="./js/simpleCalendar.js"></script>
	<script type="text/javascript" src="./js/jquery.alerts-1.1/jquery.alerts.js"></script>
    </head>
    <body>	            
	<table cellpadding="0" cellspacing="0" class="SimpleCalendar">
            <thead>
		<tr>
		{foreach from=$wdays item=wdayAux}
                    <th>{$wdayAux}</th>
		{/foreach}		
		</tr>
            </thead>
            <tbody>
                <tr>
                    {section name=wdayIdx loop=$wday}
                        <td class="SCprefix">&nbsp;</td>
                    {/section}
                    {assign var="nday" value="1"}
                    {section name=ndIdx loop=$no_days}
                        <td id="td_calendar_{$nday}">
			<time class="dayEvents" datetime="{$year}-{$month}-{$nday}">{$nday++}</time>
			{if $dHtml_arr[ndIdx]}
                            {foreach from=$dHtml_arr[ndIdx] item=dhtml}						
                                <div class="event">
                                    {$dhtml}
				</div>						
                            {/foreach}
			{/if}					
			</td>				
                        {if $count > 6}
                            </tr>
                            {assign var="count" value="0"}
                        {/if}
                        {math equation="x + 1" x=$count assign=count}
                    {/section}	
                    {if $count != 1}	
                        {math equation="8 - x" x=$count assign=countRep}
                        {section name=crIdx loop=$countRep}
                            <td class="SCprefix">&nbsp;</td>
                        {/section}								
                    {/if}
                </tr>
            </tbody>
	</table>
    </body>
</html>				