
                <div class="search-bar well">
                    <form action="{{route('rechercheHebergement')}}" method="get" role="form" class="form-inline">
                        <legend>Recherche Hebergement </legend>
                        <div class="form-group">
                            <label for="typebergementID">Type Hebergement</label>
                            <select name="typehebergement" id="typebergementID" class="form-control select-primary">
                                <option ></option>
                                <option value="maison">maison</option>
                                <option value="hotel">hotel</option>
                                <option value="gite">gite</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nbplacesID">Nombre Places</label>
                            <select name="nbplace" id="nbplacesID" class="form-control select-primary">

                                <option ></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="nbplacesID">Date</label>
                            <select name="datehebergement" id="nbplacesID" class="form-control select-primary">
                                <option value=""></option>

                                @foreach(\App\Semaine::getAllSemainesSupDate(date("Y-m-d"))->get() as $semaine)
                                    <option value="{{$semaine->DATEDEBSEM}}">{{$semaine->DATEDEBSEM}}</option>
                                    @endforeach

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Recherche</button>
                    </form>
                </div>

