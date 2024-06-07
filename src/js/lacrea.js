let APP = "";
$("#loading").hide();

function lacrea_load(
  destination = ".body",
  file = "apps/home/index.html",
  save = true
) {
  getNbNotif();
  if (file == "apps/home/index.html" || file == "apps/home/") {
    db.set("admin_app", "dashboard");
  }
  $("html").scrollTop(0);
  $("#loading").show();
  if (save) {
    db.set("app", file);
  }
  // $(destination).html("<div style='height:100vh; display:grid;align-items:center;justify-content:center'>Chargment....</div>");
  $.get(
    file + "?" + db.get("version"),
    function (data, textStatus, jqXHR) {
      $(destination).html(data);
    },
    ""
  )
    .fail((e) => {
      $(destination).html(`
        <section class="h-screen flex justify-center items-center">
            <div>
                Page non retrouvée
            </div>
        </section>
      `);
    })
    .always((e) => {
      $("#loading").hide();
    });
}

function lacrea_data() {
  $.post(
    "/server/?db-query",
    { query: "SHOW TABLES" },
    function (tables, textStatus, jqXHR) {
      tables.forEach((table) => {
        table = table[0];
        $(`.${table}_model`).each(function (index, elt) {
          // Load loading view on the target
          $(`.${table}_model`).html(
            `
                <div class="flex justify-center items-center py-16 w-full">
                    <svg class="w-12 animate-spin" viewBox="-4 -4 24.00 24.00" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#6dd765" stroke-width="1.2"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.8320000000000001"> <g fill="#000000" fill-rule="evenodd" clip-rule="evenodd"> <path d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8z" opacity=".2"></path> <path d="M7.25.75A.75.75 0 018 0a8 8 0 018 8 .75.75 0 01-1.5 0A6.5 6.5 0 008 1.5a.75.75 0 01-.75-.75z"></path> </g> </g><g id="SVGRepo_iconCarrier"> <g fill="#000000" fill-rule="evenodd" clip-rule="evenodd"> <path d="M8 1.5a6.5 6.5 0 100 13 6.5 6.5 0 000-13zM0 8a8 8 0 1116 0A8 8 0 010 8z" opacity=".2"></path> <path d="M7.25.75A.75.75 0 018 0a8 8 0 018 8 .75.75 0 01-1.5 0A6.5 6.5 0 008 1.5a.75.75 0 01-.75-.75z"></path> </g> </g></svg>
                </div>
            `
          );

          // load view
          file = `views/${table}.html`;
          if (elt.attributes.view) {
            file = "views/" + elt.attributes.view.value;
          }
          $.get(
            file + "?" + db.get("version"),
            function (data, textStatus, jqXHR) {
              let content = data;
              where = elt.attributes.where;
              order = elt.attributes.order;
              req = elt.attributes.request;
              if (order) {
                order = order.value;
              } else {
                order = null;
              }
              if (req) {
                $.post(
                  "server/?" + table + req.value,
                  JSON.parse(where.value),
                  function (data, textStatus, jqXHR) {
                    put(elt, data.data, content, order);
                  },
                  "json"
                );
              } else if (where) {
                $.post(
                  "server/?" + table + "-by",
                  JSON.parse(where.value),
                  function (data, textStatus, jqXHR) {
                    put(elt, data.data, content, order);
                  },
                  "json"
                );
              } else {
                $.getJSON(
                  "server/?" + table + "-all",
                  function (data, textStatus, jqXHR) {
                    put(elt, data.data, content, order);
                  }
                );
              }
            },
            ""
          ).fail((e) => {
            put(elt, [], null);
          });
        });
      });
    },
    "json"
  );
}
function put(elt, data, content, order) {
  elt.innerText = "";
  if (content == null) {
    none = $(`
            <div class="grid justify-center items-center py-12 text-center bg-red-500 text-gray-800 my-12 rounded">
                
                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9.75 16.5 12l-2.25 2.25m-4.5 0L7.5 12l2.25-2.25M6 20.25h12A2.25 2.25 0 0 0 20.25 18V6A2.25 2.25 0 0 0 18 3.75H6A2.25 2.25 0 0 0 3.75 6v12A2.25 2.25 0 0 0 6 20.25Z" />
                    </svg>
                
                </div>
                <span>View non retrouvé</span>
            </div>
        `);
    elt.appendChild(none[0]);
    return;
  }
  limit = 0;
  if (elt.attributes.limit) {
    limit = elt.attributes.limit.value;
  }

  // limit = elt.attributes.limit || 0
  if (order == "DESC") {
    data = data.reverse();
  }

  if (data.length == 0) {
    none = $(`
            <div class="grid justify-center items-center py-12 text-center bg-white text-black my-12 rounded">
                <span>Table vide</span>
                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </div>
            </div>
        `);
    elt.appendChild(none[0]);
    return;
  }
  data.forEach((col, i) => {
    if (i >= limit && limit > 0) {
      return;
    }
    keys = Object.keys(col);
    inst = content;
    keys.forEach((key) => {
      inst = inst.replaceAll(`#-nb-#`, i + 1);
      inst = inst.replaceAll(`##${key}##`, col[key]);
    });

    elt.appendChild($(inst)[0]);
  });
}

function lacrea_save(payload, table, callback = null) {
  $("#loading").show();
  $.post(`/server/?${table}`, payload, function (d) {
    if (callback) {
      swal("Succes", callback.success, "success");
    }
  })
    .fail((e) => {
      if (callback) {
        swal("Echec", callback.fail, "error");
      }
      console.log(e);
    })
    .always((e) => {
      $("#loading").hide();
    });
}

function urlJson() {
  page = location.href.split("?")[1];
  window.history.pushState({}, "", "/");
  if (page) {
    db.set("urlApp", page);
  }
}
urlJson();
