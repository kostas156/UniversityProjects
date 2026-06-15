function [items] = solveKnapsack(filename)
    if nargin<1
        [sizes_list, values_list, solSize, maxSize, maxItems] = imp_vals();
    else
        [sizes_list, values_list, solSize, maxSize, maxItems] = imp_vals(filename);
    end
    population = gen_init_population(32, solSize, maxItems);    
    iterations = ceil(0.45*maxItems*maxItems*solSize);
    avg_fitness = nan(iterations, 1);
    max_fitness = nan(iterations, 1);

    
    for i=1:iterations 
        max_fitness(i) = max(fit_co(population, sizes_list, values_list, solSize, maxSize));
        avg_fitness(i) = mean(nonzeros(fit_co(population,sizes_list, values_list, solSize, maxSize)));
        pop_temp = nextGeneration(population, 64, sizes_list, values_list, solSize, maxSize);
        population = pop_temp;
    end
    
    figure
    plot(1:length(avg_fitness), avg_fitness);
    title("Average Fitness");
    figure
    plot(1:length(max_fitness), max_fitness);
    title("Max Fitness");
    %}
    list = fit_co(population, sizes_list, values_list, solSize, maxSize);
    IndOfMax = find(max(list)==list);
    fit_sol = population(IndOfMax(1), 1:end);
    items = find(fit_sol==1);
end