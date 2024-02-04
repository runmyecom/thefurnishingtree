import './bootstrap';
import 'preline'

import "toastify-js/src/toastify.css";
import Toastify from 'toastify-js';
import TomSelect from 'tom-select';
import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm'

Livewire.start()
window.Toastify = Toastify;
window.Tom = TomSelect;
