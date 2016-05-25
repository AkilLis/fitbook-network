app.filter('customType', function(){
  return function(input, symbol, place){
    switch(input)
    {
      case 'CashLoad':
        return 'Цэнэглэсэн'; 
      case 'Salary':
        return 'Олгосон'; 
      case 'Award':
        return 'Олгосон';
    }
    return input;
  }
})