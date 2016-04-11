{literal}
<script>
	System.config({
    	transpiler: 'typescript', 
        typescriptOptions: { emitDecoratorMetadata: true }, 
        packages: {'js/app': {defaultExtension: 'ts'}} 
	});
    System.import('js/app-calendar/main')
    	.then(null, console.error.bind(console));
</script>
{/literal}
<app-calendar-content>Cargando...Index.tpl</app-calendar-content>