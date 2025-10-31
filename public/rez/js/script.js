(function () {
  const caclForm = document.getElementById("CalcForm");
  const progressSlider = caclForm.querySelector(".progress-slider");

  const setSliderValue = (value) => {
    progressSlider.style.setProperty("--slider-value", value ?? 0);
    progressSlider.querySelector(".progress-slider__stage-value").innerText =
      value;
  };
  const inputsBlocks = Array.from(caclForm.querySelectorAll(".native-input"));
  const recalcSlider = () => {
    const lenghtInputs = inputsBlocks.length;

    const validLength = inputsBlocks
      .map((inputBlock) => {
        const inputs = Array.from(inputBlock.querySelectorAll("input"));
        const validateArray = inputs
          .map((input) => {
            return input.type == "text" || input.type == "number"
              ? input.value?.trim()
              : input.checked;
          })
          .filter((val) => val);

        return validateArray.length > 0;
      })
      .filter((val) => val).length;

    setSliderValue(Math.floor((validLength / lenghtInputs) * 100));
  };

  inputsBlocks.forEach((val) => {
    const inputs = val.querySelectorAll("input").forEach((input) => {
      input.addEventListener("input", recalcSlider);
    });
  });

  recalcSlider();
})();
