document.querySelector('.process').addEventListener('click', productNot);
function productNot(e) {
    if (e.target.classList.contains('pross')) {
        var did = e.target.getAttribute('data-id');
        //window.history.replaceState({},'','?/pageunknow');
        switch (did){
            case 'processing':
                var obj = {
                    IDS : 'sells',
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-id'),
                    SOPS: e.target.getAttribute('data-SlsID'),
                    EOPS: e.target.getAttribute('data-stt'),
                    TOPS: e.target.firstChild.nodeValue.toLowerCase()
                }
                var arr = JSON.stringify(obj);
                console.log(arr);
                requeston('GET', 'action.php?id='+encodeURI(arr), '.btn-conf');
                return;
                case 'all':
                var obj = {
                    IDS : 'sells',
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-id'),
                    SOPS: e.target.getAttribute('data-SlsID'),
                    EOPS: e.target.getAttribute('data-stt'),
                    TOPS: e.target.firstChild.nodeValue.toLowerCase()
                }
                var arr = JSON.stringify(obj);
                console.log(arr);
                requeston('GET', 'action.php?id='+encodeURI(arr), '.btn-conf');
                return;
            case 'ride':
                var obj = {
                    IDS : 'sells',
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-id'),
                    SOPS: e.target.getAttribute('data-SlsID'),
                    EOPS: e.target.getAttribute('data-stt'),
                    TOPS: e.target.firstChild.nodeValue.toLowerCase()
                }
                var arr = JSON.stringify(obj);
                console.log(arr);
                requeston('GET', 'action.php?id='+encodeURI(arr), '.btn-conf');
                return;
            case 'complete':
                var obj = {
                    IDS : 'sells',
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-id'),
                    SOPS: e.target.getAttribute('data-SlsID'),
                    EOPS: e.target.getAttribute('data-stt'),
                    TOPS: e.target.firstChild.nodeValue.toLowerCase()
                }
                var arr = JSON.stringify(obj);
                console.log(arr);
                requeston('GET', 'action.php?id='+encodeURI(arr), '.btn-conf');
                return;
            default:
                console.log('this id is null');
        }
        
    }if (e.target.classList.contains('serv')) {
        var did = e.target.getAttribute('data-id');
        console.log(did);
        switch (did){
            case 'ride':
                var obj = {
                    IDS : 'sells',
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-id'),
                    SOPS: e.target.getAttribute('data-SlsID'),
                    EOPS: e.target.getAttribute('data-stt'),
                    TOPS: e.target.firstChild.nodeValue.toLowerCase()
                }
                var arr = JSON.stringify(obj);
                console.log(arr);
                requeston('GET', 'action2.php?id='+encodeURI(arr), '.btn-conf');
                //window.location.replace('action2.php?id='+encodeURI(arr));
                return;
             case 'complete':
                var obj = {
                    IDS : 'sells',
                    DBS : 'select',
                    OPS : e.target.getAttribute('data-id'),
                    SOPS: e.target.getAttribute('data-SlsID'),
                    EOPS: e.target.getAttribute('data-stt'),
                    TOPS: e.target.firstChild.nodeValue.toLowerCase()
                }
                var arr = JSON.stringify(obj);
                console.log(arr);
                requeston('GET', 'action2.php?id='+encodeURI(arr), '.btn-conf');
                //window.location.replace('action2.php?id='+encodeURI(arr));
                return;
            default:
                console.log('this id is null');
                return;
        }
    }
}