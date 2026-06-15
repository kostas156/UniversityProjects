function next_gen = nextGeneration(population, sizeOfPopulation, sizes_list, values_list, solSize, maxSize)
    if nargin<5
        if nargin<2
            sizeOfPopulation = size(population, 1);
        end
        [sizes_list, values_list, solSize, maxSize, ~] = imp_vals();
    end
    
    fit_list = fit_co(population, sizes_list, values_list, solSize, maxSize);
    
    next_gen = [];
  
    a = pass_n_toNextGen(population, 4, fit_list);
    
    next_gen = [a; next_gen];

    while size(next_gen, 1)<sizeOfPopulation
        [parent1, parent2] = myRouletteSel(population,fit_list);

        if rand() < 0.45
            temp_child1 = parent1;
            temp_child2 = parent2;
        else
            [temp_child1, temp_child2] = crossover(parent1, parent2, solSize);
        end
        temp_child1 = mutation(temp_child1);
        temp_child2 = mutation(temp_child2);
        
        next_gen = [next_gen ; temp_child1; temp_child2];
        if size(next_gen, 1)>=sizeOfPopulation

            next_gen = unique(next_gen, 'rows');
        end        
    end
end