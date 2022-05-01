function attachBuyEvents(){
    const buttons = document.querySelectorAll('#products button');
    for(const button of buttons){
        button.addEventListener('click', function() {
            const row = document.createElement('tr');
            let tRows = document.querySelectorAll('#cart table > tr');
            let replaced = false;
            const dataId = this.parentElement.getAttribute('data-id');
            const footer = document.querySelector('#cart tfoot');

            let element = document.createElement('td');
            element.textContent = dataId;
            row.appendChild(element);

            element = document.createElement('td');
            element.textContent = this.parentElement.querySelector('h2').textContent;
            row.appendChild(element);

            element = document.createElement('td');
            const quantity = this.parentElement.querySelector('.quantity').value;
            element.textContent = quantity;
            row.appendChild(element);

            element = document.createElement('td');
            const price = this.parentElement.querySelector('.price'). textContent;
            element.textContent = price + '€';
            row.appendChild(element);

            element = document.createElement('td');
            element.textContent = (parseInt(quantity) * parseInt(price));
            row.appendChild(element);

            element = document.createElement('td');
            const rm =  document.createElement('button');
            rm.textContent = 'X';
            element.appendChild(rm);
            row.appendChild(element)

            for(const tRow of tRows){
                if(parseInt(tRow.firstChild.textContent) === parseInt(dataId)){
                    document.querySelector('#cart table').replaceChild(row, tRow);
                    replaced = true;
                    break;
                }
            }
            if(!replaced){
                document.querySelector('#cart table').insertBefore(row, footer);
            }

            let total = 0;
            tRows = document.querySelectorAll('#cart table > tr');

            for(const tRow of tRows){
                total += parseInt(tRow.querySelector('td:nth-child(5)').textContent);
            }
            
            footer.querySelector('th:last-child').textContent = total;

            rm.addEventListener('click', function(){
                this.parentElement.parentElement.remove();
                total = 0;
                tRows = document.querySelectorAll('#cart table > tr');
                for(const tRow of tRows){
                    total += parseInt(tRow.querySelector('td:nth-child(5)').textContent);
                }
                footer.querySelector('th:last-child').textContent = total;
            })

        });
    }
}

attachBuyEvents();