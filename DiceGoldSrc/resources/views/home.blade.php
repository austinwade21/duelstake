@extends('layouts.app')

@section('content')
    <div id="app">
{{--    <div class="container">--}}
{{--        <div id="game" class="game">--}}
{{--            <canvas id="game-area" style="display: none;"></canvas>--}}
{{--            <div class="game__field">--}}
{{--                <div class="game-process">--}}
{{--                    <div class="game-bonus-element"></div>--}}
{{--                    <div class="game-process__top">--}}
{{--                        <div class="game-information tutorial-step-stats">--}}
{{--                            <ul class="game-information__list">--}}
{{--                                <li>--}}
{{--                                    <div class="game-number">Luck <span--}}
{{--                                                class="number number_luck">N/A</span></div>--}}
{{--                                    <span class="separator-dot"><span></span></span></li>--}}
{{--                                <li>--}}
{{--                                    <div class="game-number">Bets <span class="number">0</span></div>--}}
{{--                                    <span class="separator-dot"><span></span></span></li>--}}
{{--                                <li>--}}
{{--                                    <div class="game-number">Wins <span class="number">0</span></div>--}}
{{--                                    <span class="separator-dot"><span></span></span></li>--}}
{{--                                <li>--}}
{{--                                    <div class="game-number">Losses <span class="number">0</span></div>--}}
{{--                                    <span class="separator-dot"><span></span></span></li>--}}
{{--                                <li>--}}
{{--                                    <div class="game-number">Wagered <span class="number"><span--}}
{{--                                                    class="fab fa-bitcoin"></span>&nbsp;0.00000000</span>--}}
{{--                                    </div>--}}
{{--                                    <span class="separator-dot"><span></span></span></li>--}}
{{--                                <li>--}}
{{--                                    <div class="game-number">Profit <span class="number"><span--}}
{{--                                                    class="fab fa-bitcoin"></span>&nbsp; <span--}}
{{--                                                    class="number-profit">0.00000000</span></span></div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <div data-tip="Reset game stats" class="button_link button_link-small"--}}
{{--                                 currentitem="false"><span class="icon-refresh"></span></div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="game-animation tutorial-step-greeting" id="game-animation">--}}
{{--                        <div class="game-animation__low"></div>--}}
{{--                        <div class="game-animation__number">--}}
{{--                            <div class="game-animation__number-wrapper">--}}
{{--                                <div class="game-animation__number-digit-wrapper">--}}
{{--                                    <div class="game-animation__number-digit">0</div>--}}
{{--                                </div>--}}
{{--                                <div class="game-animation__number-frame">--}}
{{--                                    <svg viewBox="0 0 130 130">--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_0"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_1"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_2"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_3"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_4"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_5"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_6"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_7"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_8"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_9"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_10"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_11"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg1.svg')}}#Layer_12"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="game-animation__number-wrapper">--}}
{{--                                <div class="game-animation__number-digit-wrapper">--}}
{{--                                    <div class="game-animation__number-digit">0</div>--}}
{{--                                </div>--}}
{{--                                <div class="game-animation__number-frame">--}}
{{--                                    <svg viewBox="0 0 130 130">--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_0"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_1"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_2"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_3"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_4"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_5"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_6"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_7"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_8"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_9"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_10"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_11"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg4.svg')}}#Layer_12"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="game-animation__number-wrapper">--}}
{{--                                <div class="game-animation__number-digit-wrapper">--}}
{{--                                    <div class="game-animation__number-digit">0</div>--}}
{{--                                </div>--}}
{{--                                <div class="game-animation__number-frame">--}}
{{--                                    <svg viewBox="0 0 130 130">--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_0"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_1"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_2"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_3"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_4"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_5"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_6"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_7"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_8"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_9"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_10"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_11"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg2.svg')}}#Layer_12"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="game-animation__number-wrapper">--}}
{{--                                <div class="game-animation__number-digit-wrapper">--}}
{{--                                    <div class="game-animation__number-digit">0</div>--}}
{{--                                </div>--}}
{{--                                <div class="game-animation__number-frame">--}}
{{--                                    <svg viewBox="0 0 130 130">--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_0"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_1"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_2"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_3"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_4"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_5"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_6"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_7"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_8"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_9"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_10"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_11"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                        <use class="egg-frame"--}}
{{--                                             xlink:href="{{asset('images/egg3.svg')}}#Layer_12"--}}
{{--                                             style="visibility: hidden;"></use>--}}
{{--                                    </svg>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="game-animation__high">&lt; 5000</div>--}}
{{--                    </div>--}}
{{--                    <div class="game-circle-section">--}}
{{--                        <div class="game-bets"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="game-controls" tabindex="1">--}}
{{--                    <form class="controls-form" novalidate="">--}}
{{--                        <div class="controls-form__buttons">--}}
{{--                            <div class="switch-game-btn tutorial-step-threshold on">Low</div>--}}
{{--                            <div class="game-buttons-wrapper">--}}
{{--                                <button type="submit" id="game-submit-button"--}}
{{--                                        class="tutorial-step-game-main-button game-main-button">ROLL--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="switch-game-btn">High</div>--}}
{{--                        </div>--}}
{{--                        <div class="controls-form__row row">--}}
{{--                            <div class="grid grid_sm2">--}}
{{--                                <div id="bet-amount-item" class="grid__item">--}}
{{--                                    <div class="element-input element-input_text element-input_default tutorial-step-bet-amount">--}}
{{--                                        <label for="bet-amount-input">BET AMOUNT</label>--}}
{{--                                        <div class="element-input__holder">--}}
{{--                                            <div class="popover top" role="tooltip">--}}
{{--                                                <div class="arrow"></div>--}}
{{--                                                <div class="popover-content"></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="element-input__group"><span--}}
{{--                                                        class="element-input__addon element-input__addon_fill"><span--}}
{{--                                                            class="fab fa-bitcoin"></span></span><input--}}
{{--                                                        type="text" name="bet-amount-input" class="form-control"--}}
{{--                                                        placeholder="0.00000000" value="0.00000010">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div id="chance-item" class="grid__item">--}}
{{--                                    <div class="element-input element-input_text element-input_default tutorial-step-win-chance">--}}
{{--                                        <label for="chance">WIN CHANCE</label>--}}
{{--                                        <div class="element-input__holder">--}}
{{--                                            <div class="popover top" role="tooltip">--}}
{{--                                                <div class="arrow"></div>--}}
{{--                                                <div class="popover-content"></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="element-input__group"><input type="text" class="form-control"--}}
{{--                                                                                     name="chance-input"--}}
{{--                                                                                     placeholder="50.00%"--}}
{{--                                                                                     value="50%"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div id="payout-item" class="grid__item">--}}
{{--                                    <div class="element-input element-input_text element-input_default">--}}
{{--                                        <label for="payout">PAYOUT</label>--}}
{{--                                        <div class="element-input__holder">--}}
{{--                                            <div class="popover top" role="tooltip">--}}
{{--                                                <div class="arrow"></div>--}}
{{--                                                <div class="popover-content"></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="element-input__group"><input type="text" class="form-control"--}}
{{--                                                                                     name="payout-input"--}}
{{--                                                                                     placeholder="0.00000000"--}}
{{--                                                                                     value="1.98x">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div id="profit-item" class="grid__item">--}}
{{--                                    <div class="element-input element-input_text element-input_default">--}}
{{--                                        <label for="profit_amount">PROFIT ON WIN</label>--}}
{{--                                        <div class="element-input__holder">--}}
{{--                                            <div class="popover top" role="tooltip">--}}
{{--                                                <div class="arrow"></div>--}}
{{--                                                <div class="popover-content"></div>--}}
{{--                                            </div>--}}
{{--                                            <div class="element-input__group"><span--}}
{{--                                                        class="element-input__addon element-input__addon_fill"><span--}}
{{--                                                            class="fab fa-bitcoin"></span></span><input--}}
{{--                                                        type="text" name="profit-amount-input" class="form-control"--}}
{{--                                                        value="0.00000009" min="0.0000001"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="content-block">--}}
{{--            <div class="play-block-content">--}}
{{--                <div id="react-bets">--}}
{{--                    <div id="bets-stats">--}}
{{--                        <div class="tabs">--}}
{{--                            <!-- Nav tabs -->--}}
{{--                            <ul class="nav nav-tabs nav-tabs-custom nav-center" role="tablist">--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link active" data-toggle="tab" href="#tabAllBets"--}}
{{--                                       role="tab" aria-selected="true">--}}
{{--                                        <span class="d-none d-sm-block">{{__('ALL BETS')}}</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" data-toggle="tab" href="#tabMyBets" role="tab"--}}
{{--                                       aria-selected="false">--}}
{{--                                        <span class="d-none d-sm-block">{{__('MY BETS')}}</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" data-toggle="tab" href="#tabHighRollers" role="tab"--}}
{{--                                       aria-selected="false">--}}
{{--                                        <span class="d-none d-sm-block">{{__('HIGH ROLLERS')}}</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" data-toggle="tab" href="#tabJackPots" role="tab"--}}
{{--                                       aria-selected="false">--}}
{{--                                        <span class="d-none d-sm-block">{{__('JACKPOTS')}}</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}

{{--                            <div class="tab-content">--}}
{{--                                <div class="tab-pane table-responsive active" id="tabAllBets" role="tabpanel">--}}
{{--                                    <table class="table table-striped">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="cell-hidden cell-hidden_4">Bet ID</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_3">Time</th>--}}
{{--                                            <th>Duckling</th>--}}
{{--                                            <th>Bet Amount</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Payout</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Chance</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_1">Game</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_3">Roll</th>--}}
{{--                                            <th>Profit</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="88b7edd57b5">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">88b7edd57b5</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:41</td>--}}
{{--                                            <td class="cell-clickable" data-table-user-hash="2a584338ba"--}}
{{--                                                data-table-user-symbol="BTC"><span--}}
{{--                                                        class="link-name link-name_custom"><span--}}
{{--                                                            class="fas fa-user"></span> ajib8888</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000250</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.23%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 23</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">2537</td>--}}
{{--                                            <td><span class="amount-icon bet loss"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000250</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="ebe4d6684d4">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">ebe4d6684d4</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:40</td>--}}
{{--                                            <td class="cell-clickable" data-table-user-hash="eaebbb638a"--}}
{{--                                                data-table-user-symbol="BTC"><span--}}
{{--                                                        class="link-name link-name_custom"><span--}}
{{--                                                            class="fas fa-user"></span> Dandiego</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000266</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.99%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 99</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">1132</td>--}}
{{--                                            <td><span class="amount-icon bet win"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000266</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="6d985ee78d3">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">6d985ee78d3</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:39</td>--}}
{{--                                            <td><span class="ninja"><span></span>Duckling</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000100</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">90%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 9000</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">9858</td>--}}
{{--                                            <td><span class="amount-icon bet loss"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000100</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="6d985ee77b6">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">6d985ee77b6</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:39</td>--}}
{{--                                            <td class="cell-clickable" data-table-user-hash="7a999d25ba"--}}
{{--                                                data-table-user-symbol="BTC"><span--}}
{{--                                                        class="link-name link-name_custom"><span--}}
{{--                                                            class="fas fa-user"></span> LordPanic</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000295</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.01%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 1</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">192</td>--}}
{{--                                            <td><span class="amount-icon bet loss"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000295</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane table-responsive" id="tabMyBets" role="tabpanel">--}}
{{--                                    <table class="table table-striped">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="cell-hidden cell-hidden_4">Bet ID</th>--}}
{{--                                            <th>Time</th>--}}
{{--                                            <th>Bet Amount</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Payout</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Chance</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Game</th>--}}
{{--                                            <th>Roll</th>--}}
{{--                                            <th>Profit</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <td class="table-empty-td" colspan="9" style="text-align: center;">No bets--}}
{{--                                                yet--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane table-responsive " id="tabHighRollers" role="tabpanel">--}}
{{--                                    <table class="table table-striped">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="cell-hidden cell-hidden_4">Bet ID</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_3">Time</th>--}}
{{--                                            <th>Duckling</th>--}}
{{--                                            <th>Bet Amount</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Payout</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Chance</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_1">Game</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_3">Roll</th>--}}
{{--                                            <th>Profit</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="88b7edd57b5">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">88b7edd57b5</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:41</td>--}}
{{--                                            <td class="cell-clickable" data-table-user-hash="2a584338ba"--}}
{{--                                                data-table-user-symbol="BTC"><span--}}
{{--                                                        class="link-name link-name_custom"><span--}}
{{--                                                            class="fas fa-user"></span> ajib8888</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000250</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.23%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 23</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">2537</td>--}}
{{--                                            <td><span class="amount-icon bet loss"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000250</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="ebe4d6684d4">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">ebe4d6684d4</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:40</td>--}}
{{--                                            <td class="cell-clickable" data-table-user-hash="eaebbb638a"--}}
{{--                                                data-table-user-symbol="BTC"><span--}}
{{--                                                        class="link-name link-name_custom"><span--}}
{{--                                                            class="fas fa-user"></span> Dandiego</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000266</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.99%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 99</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">1132</td>--}}
{{--                                            <td><span class="amount-icon bet loss"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000266</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="6d985ee78d3">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">6d985ee78d3</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:39</td>--}}
{{--                                            <td><span class="ninja"><span></span>Duckling</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000100</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">90%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 9000</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">9858</td>--}}
{{--                                            <td><span class="amount-icon bet loss"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000100</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="6d985ee77b6">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">6d985ee77b6</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">17:17:39</td>--}}
{{--                                            <td class="cell-clickable" data-table-user-hash="7a999d25ba"--}}
{{--                                                data-table-user-symbol="BTC"><span--}}
{{--                                                        class="link-name link-name_custom"><span--}}
{{--                                                            class="fas fa-user"></span> LordPanic</span></td>--}}
{{--                                            <td class=""><span class="bet amount-icon"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong--}}
{{--                                                            class="bonus-decor">0.00000295</strong></span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0x</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.01%</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_1">&lt; 1</td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">192</td>--}}
{{--                                            <td><span class="amount-icon bet loss"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>-0.00000295</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                                <div class="tab-pane table-responsive" id="tabJackPots" role="tabpanel">--}}
{{--                                    <table class="table table-striped">--}}
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th class="cell-hidden cell-hidden_4">Bet ID</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_3">Time</th>--}}
{{--                                            <th>Duckling</th>--}}
{{--                                            <th>Bet Amount</th>--}}
{{--                                            <th class="cell-hidden cell-hidden_2">Percent</th>--}}
{{--                                            <th>Value</th>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="5b58e485b77">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">5b58e485b77</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">05/17/20</td>--}}
{{--                                            <td class="cell-clickable" data-table-user-hash="7a8443983a"--}}
{{--                                                data-table-user-symbol="BTC"><span--}}
{{--                                                        class="link-name link-name_custom"><span--}}
{{--                                                            class="fas fa-user"></span> DoubleDuckets</span></td>--}}
{{--                                            <td class="bet-bonus"><span class="amount-icon bet amount"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong class="bonus-decor">0.00006063</strong></span>--}}
{{--                                            </td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.61%</td>--}}
{{--                                            <td><span class="amount-icon bet win"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>0.01167622</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr class="row-clickable" data-table-bet-hash="d5868289977">--}}
{{--                                            <td class="cell-hidden cell-hidden_4"><span--}}
{{--                                                        class="link-name">d5868289977</span></td>--}}
{{--                                            <td class="cell-hidden cell-hidden_3">05/16/20</td>--}}
{{--                                            <td><span class="ninja"><span></span>Duckling</span></td>--}}
{{--                                            <td class=""><span class="amount-icon bet amount"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong class="bonus-decor">0.00001000</strong></span>--}}
{{--                                            </td>--}}
{{--                                            <td class="cell-hidden cell-hidden_2">0.1%</td>--}}
{{--                                            <td><span class="amount-icon bet win"><span--}}
{{--                                                            class="fab fa-bitcoin"></span> <strong>0.00192529</strong></span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}

{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
    </div>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
@endsection
