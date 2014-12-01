function autorun() 
{
     function humaneindex() 
     {
         var notify = humane.create(
         {
             timeout: 4000,
             baseCls: 'humane-bigbox'
         })
         notify.log('Hola, te estan esperando tus clientes.')
     }
     onload = humaneindex();
}

