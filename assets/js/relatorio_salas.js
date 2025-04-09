document.addEventListener("DOMContentLoaded", function() {
    const accordionItems = document.querySelectorAll('.accordion .link');
    const periodoAccordionItems = document.querySelectorAll('.periodo .periodo_report');
    const usersAccordionItems = document.querySelectorAll('#user_relatorio .user-report');
  
    function toggleSubmenu(submenu) {
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    }
  
    accordionItems.forEach(item => {
        item.addEventListener('click', function() {
            const submenu = this.nextElementSibling;
            toggleSubmenu(submenu);
        });
    });
  
    periodoAccordionItems.forEach(item => {
        item.addEventListener('click', function() {
            const submenu = this.nextElementSibling;
            toggleSubmenu(submenu);
        });
    });
  
    usersAccordionItems.forEach(item => {
        item.addEventListener('click', function() {
            const submenu = this.nextElementSibling;
            toggleSubmenu(submenu);
        });
    });
  });
  
  const ctx = document.getElementById('myChart');
            
      new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: ['Não Conforme', 'Conforme', 'Intervenção'],
          datasets: [{
          data: [5, 2, 3 ],
          backgroundColor: ['#CB1010','#609437' ,'#F3B33D' ],
          borderWidth: 1
          }]
      },
      });
  
  
  const ct = document.getElementById('Chart');
            
      new Chart(ct, {
        type: 'bar',
        data: {
          labels: ['Não Conforme', 'Conforme', 'Intervenção'],
          datasets: [{
            label: 'Vizualizar quantidade',
            data: [12, 19, 3],
            backgroundColor: ['#CB1010','#609437' ,'#F3B33D' ],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
  
  
  var xhr = new XMLHttpRequest();
  
  
  
  
  
  
  
  