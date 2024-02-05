let dropList = document.querySelectorAll("form select");
let fromCurrency = document.getElementById("fromCurrency");
let toCurrency = document.getElementById("toCurrency");
let icon = document.querySelector(".icon");
let exchangeTxt = document.querySelector(".exchange_rate");
let getBtn = document.querySelector("button");

let keyExchangeRates = {
  // Global key currencies
  USD: {
    EUR: 0.85,
    GBP: 0.75,
    JPY: 110.45,
    AUD: 1.3,
    CAD: 1.25,
    SAR: 3.75,
    INR: 74.3,
    CNY: 6.45,
  },
  EUR: {
    USD: 1.18,
    GBP: 0.88,
    JPY: 129.53,
    AUD: 1.53,
    CAD: 1.47,
    SAR: 4.41,
    INR: 87.5,
    CNY: 7.59,
  },
  GBP: {
    USD: 1.33,
    EUR: 1.14,
    JPY: 151.0,
    AUD: 1.79,
    CAD: 1.7,
    SAR: 5.19,
    INR: 102.8,
    CNY: 8.92,
  },
  JPY: {
    USD: 0.0091,
    EUR: 0.0077,
    GBP: 0.0066,
    AUD: 0.012,
    CAD: 0.011,
    SAR: 0.034,
    INR: 0.68,
    CNY: 0.059,
  },
  AUD: {
    USD: 0.77,
    EUR: 0.65,
    GBP: 0.56,
    JPY: 83.33,
    CAD: 0.96,
    SAR: 2.87,
    INR: 57.15,
    CNY: 4.97,
  },
  CAD: {
    USD: 0.8,
    EUR: 0.68,
    GBP: 0.59,
    JPY: 86.96,
    AUD: 1.04,
    SAR: 2.98,
    INR: 59.58,
    CNY: 5.17,
  },
  INR: {
    USD: 0.013,
    EUR: 0.011,
    GBP: 0.0097,
    JPY: 1.46,
    AUD: 0.017,
    CAD: 0.017,
    SAR: 0.05,
    CNY: 0.087,
  },
  CNY: {
    USD: 0.15,
    EUR: 0.13,
    GBP: 0.11,
    JPY: 16.75,
    AUD: 0.2,
    CAD: 0.19,
    SAR: 0.57,
    INR: 11.45,
  },

  // Arab countries currencies
  AED: { USD: 0.27, EUR: 0.23, GBP: 0.21, SAR: 1.01 },
  SAR: { USD: 0.27, EUR: 0.23, GBP: 0.21, AED: 0.99, KWD: 0.081, EGP: 0.015 },
  KWD: { USD: 3.31, EUR: 2.81, GBP: 2.59, SAR: 12.33 },
  EGP: { USD: 0.064, EUR: 0.054, GBP: 0.049, SAR: 0.26 },
  DZD: { USD: 0.0074, EUR: 0.0063, GBP: 0.0058, SAR: 0.028 },
  MAD: { USD: 0.11, EUR: 0.09, GBP: 0.08, SAR: 0.42 },
  QAR: { USD: 0.27, EUR: 0.23, GBP: 0.21, SAR: 1.0 },
  BHD: { USD: 2.65, EUR: 2.25, GBP: 2.07, SAR: 9.95 },
  OMR: { USD: 2.6, EUR: 2.21, GBP: 2.04, SAR: 9.77 },
  JOD: { USD: 1.41, EUR: 1.2, GBP: 1.1, SAR: 5.28 },
  TND: { USD: 0.35, EUR: 0.3, GBP: 0.27, SAR: 1.33 },
  LBP: { USD: 0.00066, EUR: 0.00056, GBP: 0.00052, SAR: 0.0025 },
  // Add more currencies as needed
};

for (let i = 0; i < dropList.length; i++) {
  for (let currency_code in country_list) {
    let selected =
      i == 0
        ? currency_code == "USD"
          ? "selected"
          : ""
        : currency_code == "SAR"
        ? "selected"
        : "";

    let optionTag = `<option value="${currency_code}" ${selected}>
    ${currency_code}</option>`;

    dropList[i].insertAdjacentHTML("beforeend", optionTag);
  }

  dropList[i].addEventListener("change", (e) => {
    loadFlag(e.target);
  });
}

function loadFlag(element) {
  for (let code in country_list) {
    if (code == element.value) {
      let imgTag = element.parentElement.querySelector("img");
      imgTag.src = `https://flagcdn.com/48x36/${country_list[
        code
      ].toLowerCase()}.png`;
    }
  }
}

function getExchangeValue() {
  const amount = document.querySelector("form input");
  let amountVal = parseFloat(amount.value);
  if (isNaN(amountVal) || amountVal <= 0) {
    amount.value = "1";
    amountVal = 1;
  }

  exchangeTxt.innerText = "Calculating exchange rate...";
  try {
    let fromRates = keyExchangeRates[fromCurrency.value];
    let exchangeRate = fromRates ? fromRates[toCurrency.value] : null;
    if (exchangeRate) {
      let total = (amountVal * exchangeRate).toFixed(2);
      exchangeTxt.innerText = `${amountVal} ${fromCurrency.value} = ${total} ${toCurrency.value}`;
    } else {
      exchangeTxt.innerText = "Exchange rate not available";
    }
  } catch (error) {
    exchangeTxt.innerText = "An error occurred";
  }
}

window.addEventListener("load", () => {
  getExchangeValue();
});

icon.addEventListener("click", () => {
  let tempCode = fromCurrency.value;
  fromCurrency.value = toCurrency.value;
  toCurrency.value = tempCode;
  loadFlag(fromCurrency);
  loadFlag(toCurrency);
  getExchangeValue();
});

getBtn.addEventListener("click", (e) => {
  e.preventDefault();
  getExchangeValue();
});
