document.addEventListener("DOMContentLoaded", function(event) {
    const tables = document.querySelectorAll('table');
    addParentToTables(tables);
    // const tableWrap = document.querySelectorAll(".table-wrap");
    // const tableWrapChild = document.querySelectorAll('.table-wrap__child');
    // const contentWrap = document.querySelector('#content');
    // addMouseScrollToTables(tableWrapChild);
    // let scrollCurrant = 0;

    // tables.forEach(e => {
    //     if (e.offsetWidth < contentWrap.offsetWidth) {
    //         e.closest(".table-wrap").classList.remove('end');
    //     }
    // });
    // tableWrap.forEach(elem => {
    //
    //     tableWrapChild.forEach(e => {
    //         e.addEventListener('scroll', function(event ){
    //             if(scrollCurrant > this.scrollLeft) {
    //                 elem.classList.add('end');
    //                 elem.classList.remove('start');
    //             }else {
    //                 elem.classList.add('start');
    //                 elem.classList.remove('end');
    //             }
    //             scrollCurrant = this.scrollLeft;
    //         });
    //
    //     });
    //
    // })
});

function addParentToTables(tables) {
    if(!tables.length){
        return;
    }
    tables.forEach(e => {
        // support legacy editors where tables already wrapper in <div> manually
        if (e.parentElement.classList.contains('my-table-wrapper')) return;

        let wrapperTable = document.createElement('div');
        wrapperTable.setAttribute('class', 'my-table-wrapper');
        e.parentNode.insertBefore(wrapperTable, e);
        wrapperTable.appendChild(e);
    } );
    // tables.forEach(e => {
    //     let wrapperTable = document.createElement('div');
    //     wrapperTable.setAttribute('class', 'table-wrap__child');
    //     e.parentNode.insertBefore(wrapperTable, e);
    //     wrapperTable.appendChild(e);
    // } )
}



// function addMouseScrollToTables(tableWrapChild) {
//     let drag = false;
//     let coorX = 0;
//     let left = 0;
//     document.addEventListener('mouseup', function() {
//         drag = false;
//     });
//     tableWrapChild.forEach(table => {
//         table.addEventListener('mousedown', function (e) {
//             drag = true;
//             coorX = e.pageX - this.offsetLeft;
//
//         });
//         table.addEventListener('mouseup', function (e) {
//             left = this.scrollLeft;
//         });
//         table.addEventListener('mousemove', function (e) {
//             if (drag) {
//                 this.scrollLeft = left - (e.pageX - this.offsetLeft - coorX);
//             }
//         });
//     })
// }

