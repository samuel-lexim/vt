(this.webpackJSONPwpmdb=this.webpackJSONPwpmdb||[]).push([[9],{612:function(e,t,r){"use strict";r.r(t),r.d(t,"setImportTableData",function(){return m}),r.d(t,"importFile",function(){return _}),r.d(t,"uploadFileActions",function(){return O});var n=r(3),a=r.n(n),c=r(8),u=r(4),i=r(148),s=r(5),o=r(15),p=r(35),b=r(7),f=r(14),l=r(85),m=function(e){return function(t,r){return t(Object(s.a)(l.f,e))}},_=function e(t){return function(){var r=Object(c.a)(a.a.mark(function r(n,c){var l,_,d,O,j,h,v,w,k,g,x;return a.a.wrap(function(r){for(;;)switch(r.prev=r.next){case 0:return l=Object(u.h)("import_gzipped",c()),_=Object(i.selectFromImportData)("file_size",c()),(d={chunk:t.chunk,current_query:t.current_query,import_file:t.import_filename}).import_info=JSON.stringify({import_gzipped:l}),r.prev=4,r.next=7,Object(b.c)("/import-file",d);case 7:O=r.sent,r.next=14;break;case 10:return r.prev=10,r.t0=r.catch(4),n(Object(p.v)({error_type:f.a,error_message:r.t0.message})),r.abrupt("return",!1);case 14:if(j=O.data,h=j.table_sizes,v=j.table_rows,w=j.tables,n(m({table_sizes:h,table_rows:v,tables:w})),k=Math.ceil(_/j.num_chunks),g=k/1e3,n(Object(p.A)(g)),!(j.chunk>=j.num_chunks)){r.next=26;break}return n(Object(p.q)()),n(Object(s.a)(o.o,"import")),r.abrupt("return",n(Object(p.s)("MIGRATE",[],"find_replace")));case 26:return x=[{import_filename:t.import_filename,item_name:t.item_name,chunk:j.chunk,current_query:j.current_query}],r.next=29,n(Object(p.s)("IMPORT_FILE",[{fn:e,args:x}]));case 29:return r.abrupt("return",r.sent);case 30:case"end":return r.stop()}},r,null,[[4,10]])}));return function(e,t){return r.apply(this,arguments)}}()},d=function(e){return function(){var t=Object(c.a)(a.a.mark(function t(r,n){var c,u,i,l;return a.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return r(Object(s.a)(o.d,"import")),r(Object(s.a)(f.d)),t.prev=2,t.next=5,Object(b.c)("/prepare-upload",{});case 5:c=t.sent,t.next=12;break;case 8:return t.prev=8,t.t0=t.catch(2),r(Object(p.v)({error_type:f.a,error_message:t.t0.message})),t.abrupt("return",!1);case 12:return u=e.name,i=window.wpmdb_strings.importing_file_to_db.replace(/%s\s?/,u),r(Object(s.a)(f.w,i)),".gz"===u.slice(-3)&&(u=e.name.slice(0,-3)),l=[{import_filename:c.data.import_file,item_name:u,chunk:0,current_query:""}],t.next=19,r(Object(p.s)(p.a,[{fn:_,args:l}]));case 19:return t.abrupt("return",t.sent);case 20:case"end":return t.stop()}},t,null,[[2,8]])}));return function(e,r){return t.apply(this,arguments)}}()},O=function e(t){return function(){var r=Object(c.a)(a.a.mark(function r(n,l){var m,_,O,j,h;return a.a.wrap(function(r){for(;;)switch(r.prev=r.next){case 0:m=Object(u.f)("remote_site",l()),t="undefined"===typeof t?0:t,_=Object(i.selectFromImportData)("file",l()),O=t+1024e3+1,j=new FileReader,0===t&&(n(Object(s.a)(o.d,"upload")),n(Object(p.w)(Math.ceil(Object(i.selectFromImportData)("file_size",l())/1e3)))),j.onloadend=function(){var r=Object(c.a)(a.a.mark(function r(c){var u,i;return a.a.wrap(function(r){for(;;)switch(r.prev=r.next){case 0:if(c.target.readyState===FileReader.DONE){r.next=2;break}return r.abrupt("return");case 2:return u={action:"wpmdb_upload_file",file_data:c.target.result,file:_.name,file_type:_.type,stage:"import",import_info:m},r.prev=3,r.next=6,Object(b.c)("/upload-file",u);case 6:r.next=12;break;case 8:return r.prev=8,r.t0=r.catch(3),n(Object(p.v)({error_type:f.a,error_message:r.t0.message})),r.abrupt("return",!1);case 12:if(!(O<_.size)){r.next=19;break}return n(Object(p.A)(Math.ceil(1024))),r.next=16,n(Object(p.s)(p.c,[{fn:e,args:[O]}]));case 16:return r.abrupt("return",r.sent);case 19:return i=_.size-t,n(Object(p.A)(Math.ceil(i/1e3))),n(Object(s.a)(o.o,"upload")),r.next=24,n(Object(p.s)(p.d,[{fn:d,args:[_]}]));case 24:return r.abrupt("return",r.sent);case 25:case"end":return r.stop()}},r,null,[[3,8]])}));return function(e){return r.apply(this,arguments)}}(),h=_.slice(t,O),j.readAsDataURL(h);case 9:case"end":return r.stop()}},r)}));return function(e,t){return r.apply(this,arguments)}}()}}}]);