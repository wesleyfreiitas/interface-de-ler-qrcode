const jsonData = {
    "data": "{\"fields\":[{\"key\":\"Modelo:\",\"value\":\"KOCP 55FC 2LX R410A 380V\"},{\"key\":\"Refrigerante:\",\"value\":\"R410A\"},{\"key\":\"Tens\\u00e3o(3N~)\\/Frequ\\u00eancia:\",\"value\":\"380V \\/ 60Hz\"},{\"key\":\"Frio:\",\"value\":\"16.115 (55.000 BTU\\/h)\"},{\"key\":\"Frio:\",\"value\":\"5.318\"},{\"key\":\"Frio:\",\"value\":\"9,98\"},{\"key\":\"Massaderefrigerante(g):\",\"value\":\"2.550\"},{\"key\":\"Descarga:\",\"value\":\"4,2\"},{\"key\":\"Suc\\u00e7\\u00e3o:\",\"value\":\"1,2\"},{\"key\":\"Graudeprote\\u00e7\\u00e3o:\",\"value\":\"IPX4\"},{\"key\":\"Classe:\",\"value\":\"1\"},{\"key\":\"Rua:\",\"value\":\"Manoel Jo\\u00e3o Martins, S\"},{\"key\":\"CEP:\",\"value\":\"88.138-090 - Praia de Fora - Palho\\u00e7a\\/SC\"},{\"key\":\"INSCRI\\u00c7\\u00c3OESTADUAL:\",\"value\":\"255.649.339\"}],\"fulltext\":\"ports.\\nKOMECO\\nUnidade Interna\\nKOP 55FC 1LX R410A\\nModelo:KOCP 55FC 2LX R410A 380V\\nRefrigerante: R410A\\nTens\\u00e3o (3N~)\\/Frequ\\u00eancia: 380V \\/ 60Hz \\/\\nCapacidade Frio: 16.115 (55.000 BTU\\/h)\\n(W)\\nQuente:\\nPot\\u00eancia Frio: 5.318\\n(W)\\nQuente:\\nCorrente Frio: 9,98\\n(A)\\nQuente:\\nMassa de refrigerante (g): 2.550\\nMassa (kg) \\/\\n71,5\\nPeso (N)\\n701,17\\nPress\\u00e3o m\\u00e1xima Descarga: 4,2\\n(MPa)\\nSuc\\u00e7\\u00e3o: 1,2\\nGrau de prote\\u00e7\\u00e3o: IPX4\\nClasse: 1\\nImportado e comercializado por:\\nKomlog Importa\\u00e7\\u00e3o Ltda.\\nRua: Manoel Jo\\u00e3o Martins, S\\/N\\nCEP: 88.138-090 - Praia de Fora - Palho\\u00e7a\\/SC\\nCNPJ: 06.114.935\\/0015-80\\nINSCRI\\u00c7\\u00c3O ESTADUAL: 255.649.339\\nFabricado na China\\nFR\\nSFFOWDKBFQH050000281\\n860-12221605\\n20191103\\n\"}"
  };
  
  const possibleKeys = ["cod", "modelo", "sn", "código", "codigo"]; // Adicione todas as possíveis chaves aqui
  
  function findValue(data, keys) {
    // Converta a string JSON para um objeto JavaScript
    const parsedData = JSON.parse(data.data);
  
    // Itera sobre os campos em busca das chaves desejadas
    for (const field of parsedData.fields) {
      for (const key of keys) {
        // Se a chave for encontrada no campo, retorna o valor
        if (field.key.toLowerCase().includes(key.toLowerCase())) {
          return field.value;
        }
      }
    }
  
    // Se nenhuma chave for encontrada, retorna null ou outra indicação de que nada foi encontrado
    return null;
  }
  
  // Exemplo de uso
  const foundValue = findValue(jsonData, possibleKeys);
  
  console.log("Valor encontrado:", foundValue);
  