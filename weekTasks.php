<!-- User Tasks -->
<section id="user-tasks">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h4>Tarefas da Semana</h4>
          </div>
          <div class="scrollmenu">
          <table class="text-light container">
          <thead class="thead " style=" background-color:#AB47BC;">
              <tr class="scrollmenu">
              <th id="shifts" style="font-size:16px">Turno da Manhã</th>
                <th>Segunda</th>
                <th>Terça</th>
                <th>Quarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
                <th>Sábado</th>
                <th>Domingo</th>
              </tr>
            </thead>
            <tbody id="morning-shift">
              <tr>
                    <td style="background-color: #CE93D8;">Setor 1</td>
                    <td><button class="btn btn-sm btn-light text-muted" style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted" style="width:100%;" onclick="taskProcessor(tueS1MShift);"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted" style="width:100%;" onclick="taskProcessor(wenS1MShift);"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light" style="width:100%;" onclick="taskProcessor(thuS1MShift);">Rafael</button></td>
                    <td><button class="btn btn-sm btn-light text-muted" style="width:100%;" onclick="taskProcessor(friS1MShift);"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted" style="width:100%;" onclick="taskProcessor(satS1MShift);"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted" style="width:100%;" onclick="taskProcessor(sunS1MShift);"><i class="far fa-plus-square"></i></button></td>
              </tr>
              <tr>
              <td style="background-color: #CE93D8;">Setor 2</td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
              </tr>
              <tr>
              <td style="background-color: #CE93D8;">Setor 3</td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                    <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                    <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
              </tr>
            </tbody>
          </table>      
            <table class="text-light">
            <thead class="thead" style=" background-color:#FF8C00">
            <th id="shifts" style="font-size:17px;">Turno da Tarde</th>

                  <th>Segunda</th>
                  <th>Terça</th>
                  <th>Quarta</th>
                  <th>Quinta</th>
                  <th>Sexta</th>
                  <th>Sábado</th>
                  <th>Domingo</th>
                </tr>
              </thead>    
              <tbody id="evening-shift">
                <tr class="">
                <td style="background-color: #FFD54F;">Setor 1</td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                </tr>
                <tr class="">
                <td style="background-color: #FFD54F;">Setor 2</td>
                      <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>                    
                </tr>
                <tr class="">
                <td style="background-color: #FFD54F;">Setor 3</td>
                      <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                </tr>
              </tbody>
            </table>
            <table  class="text-light">
            <thead class="thead-dark bg-dark">
            <th id="shifts" style="font-size:17px;" class="bg-dark">Turno da Noite</th>
                  <th>Segunda</th>
                  <th>Terça</th>
                  <th>Quarta</th>
                  <th>Quinta</th>
                  <th>Sexta</th>
                  <th>Sábado</th>
                  <th>Domingo</th>
                </tr>
              </thead>   
              <tbody id="afternnon-shift">
                <tr>
                      <td style="background-color: #808080;">Setor 1</td>
                      <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                </tr>
                <tr>
                <td style="background-color: #808080;">Setor 2</td>

                      <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                </tr>
                <tr>
                <td style="background-color: #808080;">Setor 3</td>

                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                      <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                        <td><button class="btn btn-sm btn-light" style="width:100%;">Rafael</button></td>
                        <td><button class="btn btn-sm btn-light text-muted " style="width:100%;"><i class="far fa-plus-square"></i></button></td>
                </tr>
              </tbody>          
            </table>
          </div>
          <br>
        </div>
      </div>
      <div class="col-md-4">
          <div class="card" id="details-card">
            <div>
              <div class="card mt-4" style="height: 490px;">
                  <div class="text-center mt-4"><i class="fab fa-readme fa-5x img-fluid"></i></div>
                  <div class="card-body task-details">
                      <h4 class="card-title mt-2">Selecione uma Tarefa para ver mais detalhes</h4>
                      <div class="task-info"></div>
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script ></script>