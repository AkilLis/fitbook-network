app.filter('groupType', function(){
  return function(input, symbol, place){
    switch(input)
    {
      case 1:
        return '1-р үе'; 
      case 2:
        return '2-р үе'; 
      case 3:
        return '3-р үе';
      case 4:
        return 'Менежер';
      default:
        return '1-р үе'; 
    }
    return input;
  }
});

app.filter('customType', function(){
  return function(input, symbol, place){
    switch(input)
    {
      case 'CashLoad':
        return 'Цэнэглэсэн'; 
      default:
        return 'Олгосон';
    }
    return input;
  }
});

app.filter('accountType', function(){
  return function(input, symbol, place){
    debugger;
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

