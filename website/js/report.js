const from = document.getElementById('from');
const to = document.getElementById('to');
from.addEventListener('change', event => {
  to.min = event.target.value
});
to.addEventListener('change', event => {
  from.max = event.target.value
});
