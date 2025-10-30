//https://mattperry.is/writing-code/how-to-write-a-tween
export const tween = function({
    from = 0,
    to = 1,
    duration = 300,
    ease = easeOut,
    onUpdate
  } = {}) {
    const delta = to - from;
    const startTime = performance.now();
  
    function update(currentTime) {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);
      const latest = from + ease(progress) * delta;
  
      if (onUpdate) onUpdate(latest);
  
      if (progress < 1) {
        requestAnimationFrame(update);
      }
    }
    requestAnimationFrame(update);
}
  
export const easeOut = function(progress, power = 2) {
    return 1 - (1 - progress) ** power;
}
