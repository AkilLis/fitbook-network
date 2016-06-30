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
});

app.filter('accountType', function(){
  return function(input, symbol, place){
    switch(input)
    {
      case 'Award':
        return 'Шагналын данс'; 
      case 'Bonus':
        return 'Урамшуулалын данс'; 
      case 'Cash':
        return 'Бэлэн мөнгөний данс';
      case 'Usage':
        return 'Хэрэглээний данс';
      case 'Saving':
        return 'Хуримтлалын данс';
    }
    return input;
  }
});