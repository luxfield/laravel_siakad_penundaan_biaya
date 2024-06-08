@if (Session::get('user') == 'Wadek' &&
                                DB::table('laporan_dana')->where('id', '=', $pengajuan_dana[0]->id)->count() == 1
                                && DB::table('laporan_dana_proses')->where([['id', '=', $pengajuan_dana[0]->id],['disetujui','=','Wadek']]))
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-primary" name="action"
                                        value="setuju">mengesahkan laporan penggunaan dana</button>
                                </div>
                            @endif

                            @if (Session::get('user') == 'Wadek' &&
                            DB::table('pengajuan_dana_proses')->where('id', '=', $pengajuan_dana[0]->id)->count() == 1 &&
                            DB::table('pengajuan_dana_proses')->where('dikonfirmasi', '=', '-')->count() == 1)
                                <div class="card-footer">
                                    <button type="submit" name="action" value="setuju"
                                        class="btn btn-primary">Setuju</button>
                                    <button type="submit" name="action" value="tolak"
                                        class="btn btn-danger">Tolak</button>
                                </div>
                            @endif
                            @if (Session::get('user') == 'Wadek' &&
                            DB::table('pengajuan_dana_proses')->where('dikonfirmasi', '=', 'TU')->count() == 1)
                            <div class="card-footer">
                                <button type="submit" class="btn btn-block btn-primary"
                                    name="action">Mengesahkan</button>
                            </div>
                            @endif
                            @if ((Session::get('user') == 'TU') &&
                            DB::table('pengajuan_dana_proses')->where([
                                ['disetujui','=','Wadek'],
                                ['id','=',$pengajuan_dana[0]->id],
                            ]
                                )->count() == 1)
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-primary"
                                        name="action">Konfirmasi ke dekan</button>
                                </div>
                            @endif
                            @if (Session::get('user') == 'TU' && $pengajuan_dana[0]->status == 'pending' )
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-primary">Teruskan ke
                                        dekan</button>
                                </div>
                            @endif
                            @if (Session::get('user') == 'TU' && DB::table('laporan_dana')->where('id','=',$pengajuan_dana[0]->id)->count() == 1
                            && $pengajuan_dana[0]->status != 'pending')
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-block btn-primary" name="action">Teruskan ke
                                        warek</button>
                                </div>
                            @endif
